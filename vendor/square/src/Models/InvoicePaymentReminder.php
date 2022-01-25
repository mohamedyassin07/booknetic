<?php



namespace Square\Models;

/**
 * Describes a payment request reminder (automatic notification) that Square sends
 * to the customer. You configure a reminder relative to the payment request
 * `due_date`.
 */
class InvoicePaymentReminder implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var int|null
     */
    private $relativeScheduledDays;

    /**
     * @var string|null
     */
    private $message;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $sentAt;

    /**
     * Returns Uid.
     *
     * A Square-assigned ID that uniquely identifies the reminder within the
     * `InvoicePaymentRequest`.
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * A Square-assigned ID that uniquely identifies the reminder within the
     * `InvoicePaymentRequest`.
     *
     * @maps uid
     */
    public function setUid($uid = null)
    {
        $this->uid = $uid;
    }

    /**
     * Returns Relative Scheduled Days.
     *
     * The number of days before (a negative number) or after (a positive number)
     * the payment request `due_date` when the reminder is sent. For example, -3 indicates that
     * the reminder should be sent 3 days before the payment request `due_date`.
     */
    public function getRelativeScheduledDays()
    {
        return $this->relativeScheduledDays;
    }

    /**
     * Sets Relative Scheduled Days.
     *
     * The number of days before (a negative number) or after (a positive number)
     * the payment request `due_date` when the reminder is sent. For example, -3 indicates that
     * the reminder should be sent 3 days before the payment request `due_date`.
     *
     * @maps relative_scheduled_days
     */
    public function setRelativeScheduledDays($relativeScheduledDays = null)
    {
        $this->relativeScheduledDays = $relativeScheduledDays;
    }

    /**
     * Returns Message.
     *
     * The reminder message.
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets Message.
     *
     * The reminder message.
     *
     * @maps message
     */
    public function setMessage($message = null)
    {
        $this->message = $message;
    }

    /**
     * Returns Status.
     *
     * The status of a payment request reminder.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The status of a payment request reminder.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns Sent At.
     *
     * If sent, the timestamp when the reminder was sent, in RFC 3339 format.
     */
    public function getSentAt()
    {
        return $this->sentAt;
    }

    /**
     * Sets Sent At.
     *
     * If sent, the timestamp when the reminder was sent, in RFC 3339 format.
     *
     * @maps sent_at
     */
    public function setSentAt($sentAt = null)
    {
        $this->sentAt = $sentAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->uid)) {
            $json['uid']                     = $this->uid;
        }
        if (isset($this->relativeScheduledDays)) {
            $json['relative_scheduled_days'] = $this->relativeScheduledDays;
        }
        if (isset($this->message)) {
            $json['message']                 = $this->message;
        }
        if (isset($this->status)) {
            $json['status']                  = $this->status;
        }
        if (isset($this->sentAt)) {
            $json['sent_at']                 = $this->sentAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
