<?php



namespace Square\Models;

class InventoryAdjustmentGroup implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $rootAdjustmentId;

    /**
     * @var string|null
     */
    private $fromState;

    /**
     * @var string|null
     */
    private $toState;

    /**
     * Returns Id.
     *
     * A unique ID generated by Square for the
     * `InventoryAdjustmentGroup`.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * A unique ID generated by Square for the
     * `InventoryAdjustmentGroup`.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Root Adjustment Id.
     *
     * The inventory adjustment of the composed variation.
     */
    public function getRootAdjustmentId()
    {
        return $this->rootAdjustmentId;
    }

    /**
     * Sets Root Adjustment Id.
     *
     * The inventory adjustment of the composed variation.
     *
     * @maps root_adjustment_id
     */
    public function setRootAdjustmentId($rootAdjustmentId = null)
    {
        $this->rootAdjustmentId = $rootAdjustmentId;
    }

    /**
     * Returns From State.
     *
     * Indicates the state of a tracked item quantity in the lifecycle of goods.
     */
    public function getFromState()
    {
        return $this->fromState;
    }

    /**
     * Sets From State.
     *
     * Indicates the state of a tracked item quantity in the lifecycle of goods.
     *
     * @maps from_state
     */
    public function setFromState($fromState = null)
    {
        $this->fromState = $fromState;
    }

    /**
     * Returns To State.
     *
     * Indicates the state of a tracked item quantity in the lifecycle of goods.
     */
    public function getToState()
    {
        return $this->toState;
    }

    /**
     * Sets To State.
     *
     * Indicates the state of a tracked item quantity in the lifecycle of goods.
     *
     * @maps to_state
     */
    public function setToState($toState = null)
    {
        $this->toState = $toState;
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
            $json['id']                 = $this->id;
        }
        if (isset($this->rootAdjustmentId)) {
            $json['root_adjustment_id'] = $this->rootAdjustmentId;
        }
        if (isset($this->fromState)) {
            $json['from_state']         = $this->fromState;
        }
        if (isset($this->toState)) {
            $json['to_state']           = $this->toState;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
