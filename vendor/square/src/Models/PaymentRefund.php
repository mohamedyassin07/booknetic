<?php



namespace Square\Models;

/**
 * Represents a refund of a payment made using Square. Contains information about
 * the original payment and the amount of money refunded.
 */
class PaymentRefund implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var Money
     */
    private $amountMoney;

    /**
     * @var Money|null
     */
    private $appFeeMoney;

    /**
     * @var ProcessingFee[]|null
     */
    private $processingFee;

    /**
     * @var string|null
     */
    private $paymentId;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var string|null
     */
    private $reason;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @param $id
     * @param Money $amountMoney
     */
    public function __construct($id, Money $amountMoney)
    {
        $this->id = $id;
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Id.
     *
     * The unique ID for this refund, generated by Square.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The unique ID for this refund, generated by Square.
     *
     * @required
     * @maps id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns Status.
     *
     * The refund's status:
     * - `PENDING` - Awaiting approval.
     * - `COMPLETED` - Successfully completed.
     * - `REJECTED` - The refund was rejected.
     * - `FAILED` - An error occurred.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The refund's status:
     * - `PENDING` - Awaiting approval.
     * - `COMPLETED` - Successfully completed.
     * - `REJECTED` - The refund was rejected.
     * - `FAILED` - An error occurred.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns Location Id.
     *
     * The location ID associated with the payment this refund is attached to.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The location ID associated with the payment this refund is attached to.
     *
     * @maps location_id
     */
    public function setLocationId($locationId = null)
    {
        $this->locationId = $locationId;
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
     * Returns App Fee Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAppFeeMoney()
    {
        return $this->appFeeMoney;
    }

    /**
     * Sets App Fee Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps app_fee_money
     */
    public function setAppFeeMoney(Money $appFeeMoney = null)
    {
        $this->appFeeMoney = $appFeeMoney;
    }

    /**
     * Returns Processing Fee.
     *
     * Processing fees and fee adjustments assessed by Square for this refund.
     *
     * @return ProcessingFee[]|null
     */
    public function getProcessingFee()
    {
        return $this->processingFee;
    }

    /**
     * Sets Processing Fee.
     *
     * Processing fees and fee adjustments assessed by Square for this refund.
     *
     * @maps processing_fee
     *
     * @param ProcessingFee[]|null $processingFee
     */
    public function setProcessingFee(array $processingFee = null)
    {
        $this->processingFee = $processingFee;
    }

    /**
     * Returns Payment Id.
     *
     * The ID of the payment associated with this refund.
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     *
     * The ID of the payment associated with this refund.
     *
     * @maps payment_id
     */
    public function setPaymentId($paymentId = null)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Returns Order Id.
     *
     * The ID of the order associated with the refund.
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The ID of the order associated with the refund.
     *
     * @maps order_id
     */
    public function setOrderId($orderId = null)
    {
        $this->orderId = $orderId;
    }

    /**
     * Returns Reason.
     *
     * The reason for the refund.
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Sets Reason.
     *
     * The reason for the refund.
     *
     * @maps reason
     */
    public function setReason($reason = null)
    {
        $this->reason = $reason;
    }

    /**
     * Returns Created At.
     *
     * The timestamp of when the refund was created, in RFC 3339 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp of when the refund was created, in RFC 3339 format.
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
     * The timestamp of when the refund was last updated, in RFC 3339 format.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp of when the refund was last updated, in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                 = $this->id;
        if (isset($this->status)) {
            $json['status']         = $this->status;
        }
        if (isset($this->locationId)) {
            $json['location_id']    = $this->locationId;
        }
        $json['amount_money']       = $this->amountMoney;
        if (isset($this->appFeeMoney)) {
            $json['app_fee_money']  = $this->appFeeMoney;
        }
        if (isset($this->processingFee)) {
            $json['processing_fee'] = $this->processingFee;
        }
        if (isset($this->paymentId)) {
            $json['payment_id']     = $this->paymentId;
        }
        if (isset($this->orderId)) {
            $json['order_id']       = $this->orderId;
        }
        if (isset($this->reason)) {
            $json['reason']         = $this->reason;
        }
        if (isset($this->createdAt)) {
            $json['created_at']     = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']     = $this->updatedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
