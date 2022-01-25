<?php



namespace Square\Models;

/**
 * Information about fulfillment updates.
 */
class OrderFulfillmentUpdatedUpdate implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $fulfillmentUid;

    /**
     * @var string|null
     */
    private $oldState;

    /**
     * @var string|null
     */
    private $newState;

    /**
     * Returns Fulfillment Uid.
     *
     * A unique ID that identifies the fulfillment only within this order.
     */
    public function getFulfillmentUid()
    {
        return $this->fulfillmentUid;
    }

    /**
     * Sets Fulfillment Uid.
     *
     * A unique ID that identifies the fulfillment only within this order.
     *
     * @maps fulfillment_uid
     */
    public function setFulfillmentUid($fulfillmentUid = null)
    {
        $this->fulfillmentUid = $fulfillmentUid;
    }

    /**
     * Returns Old State.
     *
     * The current state of this fulfillment.
     */
    public function getOldState()
    {
        return $this->oldState;
    }

    /**
     * Sets Old State.
     *
     * The current state of this fulfillment.
     *
     * @maps old_state
     */
    public function setOldState($oldState = null)
    {
        $this->oldState = $oldState;
    }

    /**
     * Returns New State.
     *
     * The current state of this fulfillment.
     */
    public function getNewState()
    {
        return $this->newState;
    }

    /**
     * Sets New State.
     *
     * The current state of this fulfillment.
     *
     * @maps new_state
     */
    public function setNewState($newState = null)
    {
        $this->newState = $newState;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->fulfillmentUid)) {
            $json['fulfillment_uid'] = $this->fulfillmentUid;
        }
        if (isset($this->oldState)) {
            $json['old_state']       = $this->oldState;
        }
        if (isset($this->newState)) {
            $json['new_state']       = $this->newState;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
