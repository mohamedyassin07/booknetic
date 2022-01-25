<?php



namespace Square\Models;

class RetrieveInventoryAdjustmentResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var InventoryAdjustment|null
     */
    private $adjustment;

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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors']     = $this->errors;
        }
        if (isset($this->adjustment)) {
            $json['adjustment'] = $this->adjustment;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
