<?php



namespace Square\Models;

/**
 * Represents a single physical count, inventory, adjustment, or transfer
 * that is part of the history of inventory changes for a particular
 * [CatalogObject]($m/CatalogObject) instance.
 */
class InventoryChange implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $type;

    /**
     * @var InventoryPhysicalCount|null
     */
    private $physicalCount;

    /**
     * @var InventoryAdjustment|null
     */
    private $adjustment;

    /**
     * @var InventoryTransfer|null
     */
    private $transfer;

    /**
     * @var CatalogMeasurementUnit|null
     */
    private $measurementUnit;

    /**
     * @var string|null
     */
    private $measurementUnitId;

    /**
     * Returns Type.
     *
     * Indicates how the inventory change was applied to a tracked product quantity.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Indicates how the inventory change was applied to a tracked product quantity.
     *
     * @maps type
     */
    public function setType($type = null)
    {
        $this->type = $type;
    }

    /**
     * Returns Physical Count.
     *
     * Represents the quantity of an item variation that is physically present
     * at a specific location, verified by a seller or a seller's employee. For example,
     * a physical count might come from an employee counting the item variations on
     * hand or from syncing with an external system.
     */
    public function getPhysicalCount()
    {
        return $this->physicalCount;
    }

    /**
     * Sets Physical Count.
     *
     * Represents the quantity of an item variation that is physically present
     * at a specific location, verified by a seller or a seller's employee. For example,
     * a physical count might come from an employee counting the item variations on
     * hand or from syncing with an external system.
     *
     * @maps physical_count
     */
    public function setPhysicalCount(InventoryPhysicalCount $physicalCount = null)
    {
        $this->physicalCount = $physicalCount;
    }

    /**
     * Returns Adjustment.
     *
     * Represents a change in state or quantity of product inventory at a
     * particular time and location.
     */
    public function getAdjustment()
    {
        return $this->adjustment;
    }

    /**
     * Sets Adjustment.
     *
     * Represents a change in state or quantity of product inventory at a
     * particular time and location.
     *
     * @maps adjustment
     */
    public function setAdjustment(InventoryAdjustment $adjustment = null)
    {
        $this->adjustment = $adjustment;
    }

    /**
     * Returns Transfer.
     *
     * Represents the transfer of a quantity of product inventory at a
     * particular time from one location to another.
     */
    public function getTransfer()
    {
        return $this->transfer;
    }

    /**
     * Sets Transfer.
     *
     * Represents the transfer of a quantity of product inventory at a
     * particular time from one location to another.
     *
     * @maps transfer
     */
    public function setTransfer(InventoryTransfer $transfer = null)
    {
        $this->transfer = $transfer;
    }

    /**
     * Returns Measurement Unit.
     *
     * Represents the unit used to measure a `CatalogItemVariation` and
     * specifies the precision for decimal quantities.
     */
    public function getMeasurementUnit()
    {
        return $this->measurementUnit;
    }

    /**
     * Sets Measurement Unit.
     *
     * Represents the unit used to measure a `CatalogItemVariation` and
     * specifies the precision for decimal quantities.
     *
     * @maps measurement_unit
     */
    public function setMeasurementUnit(CatalogMeasurementUnit $measurementUnit = null)
    {
        $this->measurementUnit = $measurementUnit;
    }

    /**
     * Returns Measurement Unit Id.
     *
     * The ID of the [CatalogMeasurementUnit]($m/CatalogMeasurementUnit) object representing the catalog
     * measurement unit associated with the inventory change.
     */
    public function getMeasurementUnitId()
    {
        return $this->measurementUnitId;
    }

    /**
     * Sets Measurement Unit Id.
     *
     * The ID of the [CatalogMeasurementUnit]($m/CatalogMeasurementUnit) object representing the catalog
     * measurement unit associated with the inventory change.
     *
     * @maps measurement_unit_id
     */
    public function setMeasurementUnitId($measurementUnitId = null)
    {
        $this->measurementUnitId = $measurementUnitId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->type)) {
            $json['type']                = $this->type;
        }
        if (isset($this->physicalCount)) {
            $json['physical_count']      = $this->physicalCount;
        }
        if (isset($this->adjustment)) {
            $json['adjustment']          = $this->adjustment;
        }
        if (isset($this->transfer)) {
            $json['transfer']            = $this->transfer;
        }
        if (isset($this->measurementUnit)) {
            $json['measurement_unit']    = $this->measurementUnit;
        }
        if (isset($this->measurementUnitId)) {
            $json['measurement_unit_id'] = $this->measurementUnitId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
