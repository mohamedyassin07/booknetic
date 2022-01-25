<?php



namespace Square\Models;

class TerminalRefund implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $refundId;

    /**
     * @var string
     */
    private $paymentId;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var Money
     */
    private $amountMoney;

    /**
     * @var string|null
     */
    private $reason;

    /**
     * @var string|null
     */
    private $deviceId;

    /**
     * @var string|null
     */
    private $deadlineDuration;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $cancelReason;

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
    private $appId;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @param $paymentId
     * @param Money $amountMoney
     */
    public function __construct($paymentId, Money $amountMoney)
    {
        $this->paymentId = $paymentId;
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Id.
     *
     * A unique ID for this `TerminalRefund`.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * A unique ID for this `TerminalRefund`.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Refund Id.
     *
     * The reference to the payment refund created by completing this `TerminalRefund`.
     */
    public function getRefundId()
    {
        return $this->refundId;
    }

    /**
     * Sets Refund Id.
     *
     * The reference to the payment refund created by completing this `TerminalRefund`.
     *
     * @maps refund_id
     */
    public function setRefundId($refundId = null)
    {
        $this->refundId = $refundId;
    }

    /**
     * Returns Payment Id.
     *
     * The unique ID of the payment being refunded.
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     *
     * The unique ID of the payment being refunded.
     *
     * @required
     * @maps payment_id
     */
    public function setPaymentId($paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Returns Order Id.
     *
     * The reference to the Square order ID for the payment identified by the `payment_id`.
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The reference to the Square order ID for the payment identified by the `payment_id`.
     *
     * @maps order_id
     */
    public function setOrderId($orderId = null)
    {
        $this->orderId = $orderId;
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
     * Returns Reason.
     *
     * A description of the reason for the refund.
     * Note: maximum 192 characters
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Sets Reason.
     *
     * A description of the reason for the refund.
     * Note: maximum 192 characters
     *
     * @maps reason
     */
    public function setReason($reason = null)
    {
        $this->reason = $reason;
    }

    /**
     * Returns Device Id.
     *
     * The unique ID of the device intended for this `TerminalRefund`.
     * The Id can be retrieved from /v2/devices api.
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * Sets Device Id.
     *
     * The unique ID of the device intended for this `TerminalRefund`.
     * The Id can be retrieved from /v2/devices api.
     *
     * @maps device_id
     */
    public function setDeviceId($deviceId = null)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Deadline Duration.
     *
     * The RFC 3339 duration, after which the refund is automatically canceled.
     * A `TerminalRefund` that is `PENDING` is automatically `CANCELED` and has a cancellation reason
     * of `TIMED_OUT`.
     *
     * Default: 5 minutes from creation.
     *
     * Maximum: 5 minutes
     */
    public function getDeadlineDuration()
    {
        return $this->deadlineDuration;
    }

    /**
     * Sets Deadline Duration.
     *
     * The RFC 3339 duration, after which the refund is automatically canceled.
     * A `TerminalRefund` that is `PENDING` is automatically `CANCELED` and has a cancellation reason
     * of `TIMED_OUT`.
     *
     * Default: 5 minutes from creation.
     *
     * Maximum: 5 minutes
     *
     * @maps deadline_duration
     */
    public function setDeadlineDuration($deadlineDuration = null)
    {
        $this->deadlineDuration = $deadlineDuration;
    }

    /**
     * Returns Status.
     *
     * The status of the `TerminalRefund`.
     * Options: `PENDING`, `IN_PROGRESS`, `CANCELED`, or `COMPLETED`.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The status of the `TerminalRefund`.
     * Options: `PENDING`, `IN_PROGRESS`, `CANCELED`, or `COMPLETED`.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns Cancel Reason.
     */
    public function getCancelReason()
    {
        return $this->cancelReason;
    }

    /**
     * Sets Cancel Reason.
     *
     * @maps cancel_reason
     */
    public function setCancelReason($cancelReason = null)
    {
        $this->cancelReason = $cancelReason;
    }

    /**
     * Returns Created At.
     *
     * The time when the `TerminalRefund` was created, as an RFC 3339 timestamp.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the `TerminalRefund` was created, as an RFC 3339 timestamp.
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
     * The time when the `TerminalRefund` was last updated, as an RFC 3339 timestamp.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The time when the `TerminalRefund` was last updated, as an RFC 3339 timestamp.
     *
     * @maps updated_at
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns App Id.
     *
     * The ID of the application that created the refund.
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * Sets App Id.
     *
     * The ID of the application that created the refund.
     *
     * @maps app_id
     */
    public function setAppId($appId = null)
    {
        $this->appId = $appId;
    }

    /**
     * Returns Location Id.
     *
     * The location of the device where the `TerminalRefund` was directed.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The location of the device where the `TerminalRefund` was directed.
     *
     * @maps location_id
     */
    public function setLocationId($locationId = null)
    {
        $this->locationId = $locationId;
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
            $json['id']                = $this->id;
        }
        if (isset($this->refundId)) {
            $json['refund_id']         = $this->refundId;
        }
        $json['payment_id']            = $this->paymentId;
        if (isset($this->orderId)) {
            $json['order_id']          = $this->orderId;
        }
        $json['amount_money']          = $this->amountMoney;
        if (isset($this->reason)) {
            $json['reason']            = $this->reason;
        }
        if (isset($this->deviceId)) {
            $json['device_id']         = $this->deviceId;
        }
        if (isset($this->deadlineDuration)) {
            $json['deadline_duration'] = $this->deadlineDuration;
        }
        if (isset($this->status)) {
            $json['status']            = $this->status;
        }
        if (isset($this->cancelReason)) {
            $json['cancel_reason']     = $this->cancelReason;
        }
        if (isset($this->createdAt)) {
            $json['created_at']        = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']        = $this->updatedAt;
        }
        if (isset($this->appId)) {
            $json['app_id']            = $this->appId;
        }
        if (isset($this->locationId)) {
            $json['location_id']       = $this->locationId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
