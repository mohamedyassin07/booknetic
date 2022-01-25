<?php



namespace Square\Models;

/**
 * V1Order
 */
class V1Order implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $buyerEmail;

    /**
     * @var string|null
     */
    private $recipientName;

    /**
     * @var string|null
     */
    private $recipientPhoneNumber;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var Address|null
     */
    private $shippingAddress;

    /**
     * @var V1Money|null
     */
    private $subtotalMoney;

    /**
     * @var V1Money|null
     */
    private $totalShippingMoney;

    /**
     * @var V1Money|null
     */
    private $totalTaxMoney;

    /**
     * @var V1Money|null
     */
    private $totalPriceMoney;

    /**
     * @var V1Money|null
     */
    private $totalDiscountMoney;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var string|null
     */
    private $expiresAt;

    /**
     * @var string|null
     */
    private $paymentId;

    /**
     * @var string|null
     */
    private $buyerNote;

    /**
     * @var string|null
     */
    private $completedNote;

    /**
     * @var string|null
     */
    private $refundedNote;

    /**
     * @var string|null
     */
    private $canceledNote;

    /**
     * @var V1Tender|null
     */
    private $tender;

    /**
     * @var V1OrderHistoryEntry[]|null
     */
    private $orderHistory;

    /**
     * @var string|null
     */
    private $promoCode;

    /**
     * @var string|null
     */
    private $btcReceiveAddress;

    /**
     * @var float|null
     */
    private $btcPriceSatoshi;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(array $errors = null)
    {
        $this->errors = $errors;
    }

    /**
     * Returns Id.
     *
     * The order's unique identifier.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The order's unique identifier.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Buyer Email.
     *
     * The email address of the order's buyer.
     */
    public function getBuyerEmail()
    {
        return $this->buyerEmail;
    }

    /**
     * Sets Buyer Email.
     *
     * The email address of the order's buyer.
     *
     * @maps buyer_email
     */
    public function setBuyerEmail($buyerEmail = null)
    {
        $this->buyerEmail = $buyerEmail;
    }

    /**
     * Returns Recipient Name.
     *
     * The name of the order's buyer.
     */
    public function getRecipientName()
    {
        return $this->recipientName;
    }

    /**
     * Sets Recipient Name.
     *
     * The name of the order's buyer.
     *
     * @maps recipient_name
     */
    public function setRecipientName($recipientName = null)
    {
        $this->recipientName = $recipientName;
    }

    /**
     * Returns Recipient Phone Number.
     *
     * The phone number to use for the order's delivery.
     */
    public function getRecipientPhoneNumber()
    {
        return $this->recipientPhoneNumber;
    }

    /**
     * Sets Recipient Phone Number.
     *
     * The phone number to use for the order's delivery.
     *
     * @maps recipient_phone_number
     */
    public function setRecipientPhoneNumber($recipientPhoneNumber = null)
    {
        $this->recipientPhoneNumber = $recipientPhoneNumber;
    }

    /**
     * Returns State.
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets State.
     *
     * @maps state
     */
    public function setState($state = null)
    {
        $this->state = $state;
    }

    /**
     * Returns Shipping Address.
     *
     * Represents a physical address.
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * Sets Shipping Address.
     *
     * Represents a physical address.
     *
     * @maps shipping_address
     */
    public function setShippingAddress(Address $shippingAddress = null)
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * Returns Subtotal Money.
     */
    public function getSubtotalMoney()
    {
        return $this->subtotalMoney;
    }

    /**
     * Sets Subtotal Money.
     *
     * @maps subtotal_money
     */
    public function setSubtotalMoney(V1Money $subtotalMoney = null)
    {
        $this->subtotalMoney = $subtotalMoney;
    }

    /**
     * Returns Total Shipping Money.
     */
    public function getTotalShippingMoney()
    {
        return $this->totalShippingMoney;
    }

    /**
     * Sets Total Shipping Money.
     *
     * @maps total_shipping_money
     */
    public function setTotalShippingMoney(V1Money $totalShippingMoney = null)
    {
        $this->totalShippingMoney = $totalShippingMoney;
    }

    /**
     * Returns Total Tax Money.
     */
    public function getTotalTaxMoney()
    {
        return $this->totalTaxMoney;
    }

    /**
     * Sets Total Tax Money.
     *
     * @maps total_tax_money
     */
    public function setTotalTaxMoney(V1Money $totalTaxMoney = null)
    {
        $this->totalTaxMoney = $totalTaxMoney;
    }

    /**
     * Returns Total Price Money.
     */
    public function getTotalPriceMoney()
    {
        return $this->totalPriceMoney;
    }

    /**
     * Sets Total Price Money.
     *
     * @maps total_price_money
     */
    public function setTotalPriceMoney(V1Money $totalPriceMoney = null)
    {
        $this->totalPriceMoney = $totalPriceMoney;
    }

    /**
     * Returns Total Discount Money.
     */
    public function getTotalDiscountMoney()
    {
        return $this->totalDiscountMoney;
    }

    /**
     * Sets Total Discount Money.
     *
     * @maps total_discount_money
     */
    public function setTotalDiscountMoney(V1Money $totalDiscountMoney = null)
    {
        $this->totalDiscountMoney = $totalDiscountMoney;
    }

    /**
     * Returns Created At.
     *
     * The time when the order was created, in ISO 8601 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the order was created, in ISO 8601 format.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The time when the order was last modified, in ISO 8601 format.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The time when the order was last modified, in ISO 8601 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Expires At.
     *
     * The time when the order expires if no action is taken, in ISO 8601 format.
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Sets Expires At.
     *
     * The time when the order expires if no action is taken, in ISO 8601 format.
     *
     * @maps expires_at
     */
    public function setExpiresAt($expiresAt = null)
    {
        $this->expiresAt = $expiresAt;
    }

    /**
     * Returns Payment Id.
     *
     * The unique identifier of the payment associated with the order.
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     *
     * The unique identifier of the payment associated with the order.
     *
     * @maps payment_id
     */
    public function setPaymentId($paymentId = null)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Returns Buyer Note.
     *
     * A note provided by the buyer when the order was created, if any.
     */
    public function getBuyerNote()
    {
        return $this->buyerNote;
    }

    /**
     * Sets Buyer Note.
     *
     * A note provided by the buyer when the order was created, if any.
     *
     * @maps buyer_note
     */
    public function setBuyerNote($buyerNote = null)
    {
        $this->buyerNote = $buyerNote;
    }

    /**
     * Returns Completed Note.
     *
     * A note provided by the merchant when the order's state was set to COMPLETED, if any
     */
    public function getCompletedNote()
    {
        return $this->completedNote;
    }

    /**
     * Sets Completed Note.
     *
     * A note provided by the merchant when the order's state was set to COMPLETED, if any
     *
     * @maps completed_note
     */
    public function setCompletedNote($completedNote = null)
    {
        $this->completedNote = $completedNote;
    }

    /**
     * Returns Refunded Note.
     *
     * A note provided by the merchant when the order's state was set to REFUNDED, if any.
     */
    public function getRefundedNote()
    {
        return $this->refundedNote;
    }

    /**
     * Sets Refunded Note.
     *
     * A note provided by the merchant when the order's state was set to REFUNDED, if any.
     *
     * @maps refunded_note
     */
    public function setRefundedNote($refundedNote = null)
    {
        $this->refundedNote = $refundedNote;
    }

    /**
     * Returns Canceled Note.
     *
     * A note provided by the merchant when the order's state was set to CANCELED, if any.
     */
    public function getCanceledNote()
    {
        return $this->canceledNote;
    }

    /**
     * Sets Canceled Note.
     *
     * A note provided by the merchant when the order's state was set to CANCELED, if any.
     *
     * @maps canceled_note
     */
    public function setCanceledNote($canceledNote = null)
    {
        $this->canceledNote = $canceledNote;
    }

    /**
     * Returns Tender.
     *
     * A tender represents a discrete monetary exchange. Square represents this
     * exchange as a money object with a specific currency and amount, where the
     * amount is given in the smallest denomination of the given currency.
     *
     * Square POS can accept more than one form of tender for a single payment (such
     * as by splitting a bill between a credit card and a gift card). The `tender`
     * field of the Payment object lists all forms of tender used for the payment.
     *
     * Split tender payments behave slightly differently from single tender payments:
     *
     * The receipt_url for a split tender corresponds only to the first tender listed
     * in the tender field. To get the receipt URLs for the remaining tenders, use
     * the receipt_url fields of the corresponding Tender objects.
     *
     * *A note on gift cards**: when a customer purchases a Square gift card from a
     * merchant, the merchant receives the full amount of the gift card in the
     * associated payment.
     *
     * When that gift card is used as a tender, the balance of the gift card is
     * reduced and the merchant receives no funds. A `Tender` object with a type of
     * `SQUARE_GIFT_CARD` indicates a gift card was used for some or all of the
     * associated payment.
     */
    public function getTender()
    {
        return $this->tender;
    }

    /**
     * Sets Tender.
     *
     * A tender represents a discrete monetary exchange. Square represents this
     * exchange as a money object with a specific currency and amount, where the
     * amount is given in the smallest denomination of the given currency.
     *
     * Square POS can accept more than one form of tender for a single payment (such
     * as by splitting a bill between a credit card and a gift card). The `tender`
     * field of the Payment object lists all forms of tender used for the payment.
     *
     * Split tender payments behave slightly differently from single tender payments:
     *
     * The receipt_url for a split tender corresponds only to the first tender listed
     * in the tender field. To get the receipt URLs for the remaining tenders, use
     * the receipt_url fields of the corresponding Tender objects.
     *
     * *A note on gift cards**: when a customer purchases a Square gift card from a
     * merchant, the merchant receives the full amount of the gift card in the
     * associated payment.
     *
     * When that gift card is used as a tender, the balance of the gift card is
     * reduced and the merchant receives no funds. A `Tender` object with a type of
     * `SQUARE_GIFT_CARD` indicates a gift card was used for some or all of the
     * associated payment.
     *
     * @maps tender
     */
    public function setTender(V1Tender $tender = null)
    {
        $this->tender = $tender;
    }

    /**
     * Returns Order History.
     *
     * The history of actions associated with the order.
     *
     * @return V1OrderHistoryEntry[]|null
     */
    public function getOrderHistory()
    {
        return $this->orderHistory;
    }

    /**
     * Sets Order History.
     *
     * The history of actions associated with the order.
     *
     * @maps order_history
     *
     * @param V1OrderHistoryEntry[]|null $orderHistory
     */
    public function setOrderHistory(array $orderHistory = null)
    {
        $this->orderHistory = $orderHistory;
    }

    /**
     * Returns Promo Code.
     *
     * The promo code provided by the buyer, if any.
     */
    public function getPromoCode()
    {
        return $this->promoCode;
    }

    /**
     * Sets Promo Code.
     *
     * The promo code provided by the buyer, if any.
     *
     * @maps promo_code
     */
    public function setPromoCode($promoCode = null)
    {
        $this->promoCode = $promoCode;
    }

    /**
     * Returns Btc Receive Address.
     *
     * For Bitcoin transactions, the address that the buyer sent Bitcoin to.
     */
    public function getBtcReceiveAddress()
    {
        return $this->btcReceiveAddress;
    }

    /**
     * Sets Btc Receive Address.
     *
     * For Bitcoin transactions, the address that the buyer sent Bitcoin to.
     *
     * @maps btc_receive_address
     */
    public function setBtcReceiveAddress($btcReceiveAddress = null)
    {
        $this->btcReceiveAddress = $btcReceiveAddress;
    }

    /**
     * Returns Btc Price Satoshi.
     *
     * For Bitcoin transactions, the price of the buyer's order in satoshi (100 million satoshi equals 1
     * BTC).
     */
    public function getBtcPriceSatoshi()
    {
        return $this->btcPriceSatoshi;
    }

    /**
     * Sets Btc Price Satoshi.
     *
     * For Bitcoin transactions, the price of the buyer's order in satoshi (100 million satoshi equals 1
     * BTC).
     *
     * @maps btc_price_satoshi
     */
    public function setBtcPriceSatoshi( $btcPriceSatoshi = null)
    {
        $this->btcPriceSatoshi = $btcPriceSatoshi;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors']                 = $this->errors;
        }
        if (isset($this->id)) {
            $json['id']                     = $this->id;
        }
        if (isset($this->buyerEmail)) {
            $json['buyer_email']            = $this->buyerEmail;
        }
        if (isset($this->recipientName)) {
            $json['recipient_name']         = $this->recipientName;
        }
        if (isset($this->recipientPhoneNumber)) {
            $json['recipient_phone_number'] = $this->recipientPhoneNumber;
        }
        if (isset($this->state)) {
            $json['state']                  = $this->state;
        }
        if (isset($this->shippingAddress)) {
            $json['shipping_address']       = $this->shippingAddress;
        }
        if (isset($this->subtotalMoney)) {
            $json['subtotal_money']         = $this->subtotalMoney;
        }
        if (isset($this->totalShippingMoney)) {
            $json['total_shipping_money']   = $this->totalShippingMoney;
        }
        if (isset($this->totalTaxMoney)) {
            $json['total_tax_money']        = $this->totalTaxMoney;
        }
        if (isset($this->totalPriceMoney)) {
            $json['total_price_money']      = $this->totalPriceMoney;
        }
        if (isset($this->totalDiscountMoney)) {
            $json['total_discount_money']   = $this->totalDiscountMoney;
        }
        if (isset($this->createdAt)) {
            $json['created_at']             = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']             = $this->updatedAt;
        }
        if (isset($this->expiresAt)) {
            $json['expires_at']             = $this->expiresAt;
        }
        if (isset($this->paymentId)) {
            $json['payment_id']             = $this->paymentId;
        }
        if (isset($this->buyerNote)) {
            $json['buyer_note']             = $this->buyerNote;
        }
        if (isset($this->completedNote)) {
            $json['completed_note']         = $this->completedNote;
        }
        if (isset($this->refundedNote)) {
            $json['refunded_note']          = $this->refundedNote;
        }
        if (isset($this->canceledNote)) {
            $json['canceled_note']          = $this->canceledNote;
        }
        if (isset($this->tender)) {
            $json['tender']                 = $this->tender;
        }
        if (isset($this->orderHistory)) {
            $json['order_history']          = $this->orderHistory;
        }
        if (isset($this->promoCode)) {
            $json['promo_code']             = $this->promoCode;
        }
        if (isset($this->btcReceiveAddress)) {
            $json['btc_receive_address']    = $this->btcReceiveAddress;
        }
        if (isset($this->btcPriceSatoshi)) {
            $json['btc_price_satoshi']      = $this->btcPriceSatoshi;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
