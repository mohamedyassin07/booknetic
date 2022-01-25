<?php



namespace Square\Models;

/**
 * Represents a tender (i.e., a method of payment) used in a Square transaction.
 */
class Tender implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $transactionId;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var Money|null
     */
    private $amountMoney;

    /**
     * @var Money|null
     */
    private $tipMoney;

    /**
     * @var Money|null
     */
    private $processingFeeMoney;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var string
     */
    private $type;

    /**
     * @var TenderCardDetails|null
     */
    private $cardDetails;

    /**
     * @var TenderCashDetails|null
     */
    private $cashDetails;

    /**
     * @var AdditionalRecipient[]|null
     */
    private $additionalRecipients;

    /**
     * @var string|null
     */
    private $paymentId;

    /**
     * @param $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Returns Id.
     *
     * The tender's unique ID.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The tender's unique ID.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the transaction's associated location.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the transaction's associated location.
     *
     * @maps location_id
     */
    public function setLocationId($locationId = null)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Transaction Id.
     *
     * The ID of the tender's associated transaction.
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Sets Transaction Id.
     *
     * The ID of the tender's associated transaction.
     *
     * @maps transaction_id
     */
    public function setTransactionId($transactionId = null)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * Returns Created At.
     *
     * The timestamp for when the tender was created, in RFC 3339 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp for when the tender was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Note.
     *
     * An optional note associated with the tender at the time of payment.
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * An optional note associated with the tender at the time of payment.
     *
     * @maps note
     */
    public function setNote($note = null)
    {
        $this->note = $note;
    }

    /**
     * Returns Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAmountMoney()
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps amount_money
     */
    public function setAmountMoney(Money $amountMoney = null)
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Tip Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTipMoney()
    {
        return $this->tipMoney;
    }

    /**
     * Sets Tip Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps tip_money
     */
    public function setTipMoney(Money $tipMoney = null)
    {
        $this->tipMoney = $tipMoney;
    }

    /**
     * Returns Processing Fee Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getProcessingFeeMoney()
    {
        return $this->processingFeeMoney;
    }

    /**
     * Sets Processing Fee Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps processing_fee_money
     */
    public function setProcessingFeeMoney(Money $processingFeeMoney = null)
    {
        $this->processingFeeMoney = $processingFeeMoney;
    }

    /**
     * Returns Customer Id.
     *
     * If the tender is associated with a customer or represents a customer's card on file,
     * this is the ID of the associated customer.
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * If the tender is associated with a customer or represents a customer's card on file,
     * this is the ID of the associated customer.
     *
     * @maps customer_id
     */
    public function setCustomerId($customerId = null)
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Type.
     *
     * Indicates a tender's type.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Indicates a tender's type.
     *
     * @required
     * @maps type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns Card Details.
     *
     * Represents additional details of a tender with `type` `CARD` or `SQUARE_GIFT_CARD`
     */
    public function getCardDetails()
    {
        return $this->cardDetails;
    }

    /**
     * Sets Card Details.
     *
     * Represents additional details of a tender with `type` `CARD` or `SQUARE_GIFT_CARD`
     *
     * @maps card_details
     */
    public function setCardDetails(TenderCardDetails $cardDetails = null)
    {
        $this->cardDetails = $cardDetails;
    }

    /**
     * Returns Cash Details.
     *
     * Represents the details of a tender with `type` `CASH`.
     */
    public function getCashDetails()
    {
        return $this->cashDetails;
    }

    /**
     * Sets Cash Details.
     *
     * Represents the details of a tender with `type` `CASH`.
     *
     * @maps cash_details
     */
    public function setCashDetails(TenderCashDetails $cashDetails = null)
    {
        $this->cashDetails = $cashDetails;
    }

    /**
     * Returns Additional Recipients.
     *
     * Additional recipients (other than the merchant) receiving a portion of this tender.
     * For example, fees assessed on the purchase by a third party integration.
     *
     * @return AdditionalRecipient[]|null
     */
    public function getAdditionalRecipients()
    {
        return $this->additionalRecipients;
    }

    /**
     * Sets Additional Recipients.
     *
     * Additional recipients (other than the merchant) receiving a portion of this tender.
     * For example, fees assessed on the purchase by a third party integration.
     *
     * @maps additional_recipients
     *
     * @param AdditionalRecipient[]|null $additionalRecipients
     */
    public function setAdditionalRecipients(array $additionalRecipients = null)
    {
        $this->additionalRecipients = $additionalRecipients;
    }

    /**
     * Returns Payment Id.
     *
     * The ID of the [Payment]($m/Payment) that corresponds to this tender.
     * This value is only present for payments created with the v2 Payments API.
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     *
     * The ID of the [Payment]($m/Payment) that corresponds to this tender.
     * This value is only present for payments created with the v2 Payments API.
     *
     * @maps payment_id
     */
    public function setPaymentId($paymentId = null)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']                    = $this->id;
        }
        if (isset($this->locationId)) {
            $json['location_id']           = $this->locationId;
        }
        if (isset($this->transactionId)) {
            $json['transaction_id']        = $this->transactionId;
        }
        if (isset($this->createdAt)) {
            $json['created_at']            = $this->createdAt;
        }
        if (isset($this->note)) {
            $json['note']                  = $this->note;
        }
        if (isset($this->amountMoney)) {
            $json['amount_money']          = $this->amountMoney;
        }
        if (isset($this->tipMoney)) {
            $json['tip_money']             = $this->tipMoney;
        }
        if (isset($this->processingFeeMoney)) {
            $json['processing_fee_money']  = $this->processingFeeMoney;
        }
        if (isset($this->customerId)) {
            $json['customer_id']           = $this->customerId;
        }
        $json['type']                      = $this->type;
        if (isset($this->cardDetails)) {
            $json['card_details']          = $this->cardDetails;
        }
        if (isset($this->cashDetails)) {
            $json['cash_details']          = $this->cashDetails;
        }
        if (isset($this->additionalRecipients)) {
            $json['additional_recipients'] = $this->additionalRecipients;
        }
        if (isset($this->paymentId)) {
            $json['payment_id']            = $this->paymentId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
