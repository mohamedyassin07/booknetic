<?php

namespace BookneticApp\Integrations\PaymentGateways;

use BookneticApp\Providers\Helper;
use Square\Environment;
use Square\Exceptions\ApiException;
use Square\Models\CreateCheckoutRequest;
use Square\Models\CreateOrderRequest;
use Square\SquareClient;

class Square
{
    private $order_id;
    private $_price;
    private $_currency;
    private $_itemName;
    private $_apiContext;
    private $_locationId;
    private $_successURL;


    public function __construct(  )
    {
        $accessToken		= Helper::getOption('square_access_token', null );
        $locationId	= Helper::getOption('square_location_id', null );
        $mode			= Helper::getOption('square_mode', null ) == 'live' ? 'live' : 'sandbox';
        $this->_locationId = $locationId;

        $this->_apiContext = new SquareClient([
            'accessToken' => $accessToken,
            'environment' => $mode === 'sandbox'? Environment::SANDBOX : Environment::PRODUCTION,
        ]);
    }

    public function setId( $orderId )
    {
        $this->order_id = $orderId;

        return $this;
    }

    public function setAmount( $price , $currency = 'USD' )
    {
        $this->_price = $price*100;
        $this->_currency = $currency;

        return $this;
    }


    public function setItem( $itemId , $itemName , $itemDescription )
    {
        $this->_itemName = $itemName;

        return $this;
    }

    public function setSuccessURL( $url )
    {
        $this->_successURL = $url;

        return $this;
    }

    public function create()
    {
        $checkoutApi =  $this->_apiContext->getCheckoutApi();

        $base_price_money = new \Square\Models\Money();
        $base_price_money->setAmount($this->_price);
        $base_price_money->setCurrency($this->_currency);

        $order_line_item = new \Square\Models\OrderLineItem('1');
        $order_line_item->setName($this->_itemName);
        $order_line_item->setBasePriceMoney($base_price_money);

        $line_items = [$order_line_item];
        $order1 = new \Square\Models\Order($this->_locationId);
        $order1->setReferenceId( 'SQ-' . $this->order_id );
        $order1->setLineItems($line_items);

        $order = new CreateOrderRequest();
        $order->setOrder($order1);
        $order->setIdempotencyKey( 'SQ-' . $this->order_id );

        try
        {
            $ord_response = $this->_apiContext->getOrdersApi()->createOrder($order);
            if( $ord_response->isSuccess())
            {
                $orderId = $ord_response->getResult()->getOrder()->getId();
            }
            else
            {
                return [
                    'status'	=> false,
                    'error'		=>  bkntc__( 'Couldn\'t create a payment!' )
                ];
            }
        }
        catch (ApiException $e)
        {
            return [
                'status'	=> false,
                'error'		=>  bkntc__( 'Couldn\'t create a payment!' )
            ];
        }

        $body = new CreateCheckoutRequest('SQ-' . $this->order_id, $order);
        $body->setAskForShippingAddress(false);
        $body->setRedirectUrl($this->_successURL.'&orderId='.$orderId);

        try
        {
            $api_response =  $checkoutApi->createCheckout($this->_locationId, $body);

            if ($api_response->isSuccess())
            {
                $result = $api_response->getResult();
                $checkout = $result->getCheckout();
                $approvalUrl = $checkout->getCheckoutPageUrl();

               return [
                   'status'	=> true,
                   'url'		=> $approvalUrl
               ];
            }
            else
            {
                if ( ! empty( $api_response->getErrors() ) )
                {
                    $error_msg = esc_html( $api_response->getErrors()[ 0 ]->getDetail() );
                }
                else
                {
                    $error_msg = bkntc__( 'Couldn\'t create a payment!' );
                }

                return [
                    'status'	=> false,
                    'error'		=> $error_msg
                ];
            }

        }
        catch (\Exception $ex)
        {
            return [
                'status'	=> false,
                'error'		=> bkntc__('Couldn\'t create a payment!')
            ];
        }
    }

    public function check( $orderId  )
    {
        try
        {
            $orderApi =  $this->_apiContext->getOrdersApi();
            $order = $orderApi->retrieveOrder($orderId)->getResult()->getOrder();
            $state = $order->getState();
            $referenceId = $order->getReferenceId();

            if ( $state === 'COMPLETED' && $referenceId === 'SQ-' . $this->order_id )
            {
                return ['status' => true];
            }
            else
            {
                return ['status' => false , 'message' => 'not_approved'];
            }
        }
        catch (\Square\Exceptions\ApiException $ex)
        {
            return [ 'status' => false ];
        }
        catch (\Exception $ex)
        {
            return [ 'status' => false ];
        }
    }

}