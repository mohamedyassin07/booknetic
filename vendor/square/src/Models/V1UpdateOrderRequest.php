<?php



namespace Square\Models;

/**
 * V1UpdateOrderRequest
 */
class V1UpdateOrderRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $action;

    /**
     * @var string|null
     */
    private $shippedTrackingNumber;

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
     * @param $action
     */
    public function __construct($action)
    {
        $this->action = $action;
    }

    /**
     * Returns Action.
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Sets Action.
     *
     * @required
     * @maps action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * Returns Shipped Tracking Number.
     *
     * The tracking number of the shipment associated with the order. Only valid if action is COMPLETE.
     */
    public function getShippedTrackingNumber()
    {
        return $this->shippedTrackingNumber;
    }

    /**
     * Sets Shipped Tracking Number.
     *
     * The tracking number of the shipment associated with the order. Only valid if action is COMPLETE.
     *
     * @maps shipped_tracking_number
     */
    public function setShippedTrackingNumber($shippedTrackingNumber = null)
    {
        $this->shippedTrackingNumber = $shippedTrackingNumber;
    }

    /**
     * Returns Completed Note.
     *
     * A merchant-specified note about the completion of the order. Only valid if action is COMPLETE.
     */
    public function getCompletedNote()
    {
        return $this->completedNote;
    }

    /**
     * Sets Completed Note.
     *
     * A merchant-specified note about the completion of the order. Only valid if action is COMPLETE.
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
     * A merchant-specified note about the refunding of the order. Only valid if action is REFUND.
     */
    public function getRefundedNote()
    {
        return $this->refundedNote;
    }

    /**
     * Sets Refunded Note.
     *
     * A merchant-specified note about the refunding of the order. Only valid if action is REFUND.
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
     * A merchant-specified note about the canceling of the order. Only valid if action is CANCEL.
     */
    public function getCanceledNote()
    {
        return $this->canceledNote;
    }

    /**
     * Sets Canceled Note.
     *
     * A merchant-specified note about the canceling of the order. Only valid if action is CANCEL.
     *
     * @maps canceled_note
     */
    public function setCanceledNote($canceledNote = null)
    {
        $this->canceledNote = $canceledNote;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['action']                      = $this->action;
        if (isset($this->shippedTrackingNumber)) {
            $json['shipped_tracking_number'] = $this->shippedTrackingNumber;
        }
        if (isset($this->completedNote)) {
            $json['completed_note']          = $this->completedNote;
        }
        if (isset($this->refundedNote)) {
            $json['refunded_note']           = $this->refundedNote;
        }
        if (isset($this->canceledNote)) {
            $json['canceled_note']           = $this->canceledNote;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
