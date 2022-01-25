<?php



namespace Square\Models;

/**
 * Represents a refund processed for a Square transaction.
 */
class Refund implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $locationId;

    /**
     * @var string
     */
    private $transactionId;

    /**
     * @var string
     */
    private $tenderId;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var Money
     */
    private $amountMoney;

    /**
     * @var string
     */
    private $status;

    /**
     * @var Money|null
     */
    private $processingFeeMoney;

    /**
     * @var AdditionalRecipient[]|null
     */
    private $additionalRecipients;

    /**
     * @param $id
     * @param $locationId
     * @param $transactionId
     * @param $tenderId
     * @param $reason
     * @param Money $amountMoney
     * @param $status
     */
    public function __construct(
        $id,
        $locationId,
        $transactionId,
        $tenderId,
        $reason,
        Money $amountMoney,
        $status
    ) {
        $this->id = $id;
        $this->locationId = $locationId;
        $this->transactionId = $transactionId;
        $this->tenderId = $tenderId;
        $this->reason = $reason;
        $this->amountMoney = $amountMoney;
        $this->status = $status;
    }

    /**
     * Returns Id.
     *
     * The refund's unique ID.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The refund's unique ID.
     *
     * @required
     * @maps id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the refund's associated location.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the refund's associated location.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Transaction Id.
     *
     * The ID of the transaction that the refunded tender is part of.
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Sets Transaction Id.
     *
     * The ID of the transaction that the refunded tender is part of.
     *
     * @required
     * @maps transaction_id
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * Returns Tender Id.
     *
     * The ID of the refunded tender.
     */
    public function getTenderId()
    {
        return $this->tenderId;
    }

    /**
     * Sets Tender Id.
     *
     * The ID of the refunded tender.
     *
     * @required
     * @maps tender_id
     */
    public function setTenderId($tenderId)
    {
        $this->tenderId = $tenderId;
    }

    /**
     * Returns Created At.
     *
     * The timestamp for when the refund was created, in RFC 3339 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp for when the refund was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Reason.
     *
     * The reason for the refund being issued.
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Sets Reason.
     *
     * The reason for the refund being issued.
     *
     * @required
     * @maps reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
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
     * @required
     * @maps amount_money
     */
    public function setAmountMoney(Money $amountMoney)
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Status.
     *
     * Indicates a refund's current status.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Indicates a refund's current status.
     *
     * @required
     * @maps status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * Returns Additional Recipients.
     *
     * Additional recipients (other than the merchant) receiving a portion of this refund.
     * For example, fees assessed on a refund of a purchase by a third party integration.
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
     * Additional recipients (other than the merchant) receiving a portion of this refund.
     * For example, fees assessed on a refund of a purchase by a third party integration.
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                        = $this->id;
        $json['location_id']               = $this->locationId;
        $json['transaction_id']            = $this->transactionId;
        $json['tender_id']                 = $this->tenderId;
        if (isset($this->createdAt)) {
            $json['created_at']            = $this->createdAt;
        }
        $json['reason']                    = $this->reason;
        $json['amount_money']              = $this->amountMoney;
        $json['status']                    = $this->status;
        if (isset($this->processingFeeMoney)) {
            $json['processing_fee_money']  = $this->processingFeeMoney;
        }
        if (isset($this->additionalRecipients)) {
            $json['additional_recipients'] = $this->additionalRecipients;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
