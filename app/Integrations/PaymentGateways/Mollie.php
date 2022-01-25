<?php

namespace BookneticApp\Integrations\PaymentGateways;

use BookneticApp\Providers\Helper;
use BookneticApp\Providers\Permission;
use Mollie\Api\Exceptions\ApiException;

class Mollie
{


    private $_paymentId;
    private $_apiKey;
    private $_price;
    private $_currency;
    private $_wrongApiKey = true;
    private $_itemName;
    private $_apiContext;
    private $_successURL;


    public function __construct()
    {
        $this->_apiKey		= Helper::getOption('mollie_api_key', '' );
        if(  ! ( strpos( $this->_apiKey, 'test_' ) === false && strpos( $this->_apiKey, 'live_' ) === false )  )
        {
            $this->_wrongApiKey = false;
        }
        $this->_apiContext = new \Mollie\Api\MollieApiClient();
    }


    public function setId( $paymentId )
    {
        $this->_paymentId = $paymentId;
        return $this;
    }

    public function setAmount( $price , $currency = 'USD' )
    {
        $this->_price = number_format((float)$price, 2, '.', '');
        $this->_currency = $currency;

        return $this;
    }

    public function setTax( $tax_amount )
    {
        $this->_tax = $tax_amount;
    }

    public function setItem( $itemId , $itemName , $itemDescription )
    {
        $this->_itemId = $itemId;
        $this->_itemName = $itemName;
        $this->_itemDescription = $itemDescription;

        return $this;
    }

    public function setSuccessURL( $url )
    {
        $this->_successURL = $url;

        return $this;
    }

    public function create()
    {
        if( $this->_wrongApiKey === true )
        {
            return [
                'status'	=> false,
                'error'		=> bkntc__('Couldn\'t create a payment!')
            ];
        }

        try
        {

            $this->_apiContext->setApiKey($this->_apiKey);
            $payment = $this->_apiContext->payments->create([
                "amount" => [
                    "currency" => $this->_currency,
                    "value" => $this->_price,
                ],
                "description" => $this->_itemName ,
                "redirectUrl" => $this->_successURL,
                "metadata" => [
                    "invoice_number" => ( 'SL-' . $this->_paymentId ),
                ]
            ]);
            $approvalUrl = $payment->getCheckoutUrl();
            $paymentId = $payment->id;
            $payment = $this->_apiContext->payments->get($paymentId);

            $payment->redirectUrl = $this->_successURL."&paymentId=".$paymentId;

            $payment = $payment->update();

            return [
                'status'	=> true,
                'url'		=> $approvalUrl
            ];
        }
        catch (ApiException $ex)
        {
            $errorData = json_encode( $ex );


            error_log(  ( $errorData ) );

            return [
                'status'	=> false,
                'error'		=> isset($errorData['message']) ? esc_html( $errorData['message'] ) : bkntc__('Couldn\'t create a payment!')
            ];
        }
    }

    public function check( $invoiceNumber, $paymentId )
    {
        try
        {
            $this->_apiContext->setApiKey($this->_apiKey);
            $payment = $this->_apiContext->payments->get($paymentId);
            if( $payment->status == 'paid' && ( $payment->metadata->invoice_number == 'SL-' . $invoiceNumber ) )
            {

                return ['status' => true];
            }
            else
            {

                return ['status' => false , 'message' => 'not_approved'];
            }
        }
        catch (ApiException $ex)
        {
            $errorData = json_encode( $ex );
            error_log(  ( $errorData ) );
            return [ 'status' => false ];
        }
    }



}