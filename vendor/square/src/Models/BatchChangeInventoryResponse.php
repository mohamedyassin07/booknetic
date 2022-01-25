<?php



namespace Square\Models;

class BatchChangeInventoryResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var InventoryCount[]|null
     */
    private $counts;

    /**
     * @var InventoryChange[]|null
     */
    private $changes;

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
     * Returns Counts.
     *
     * The current counts for all objects referenced in the request.
     *
     * @return InventoryCount[]|null
     */
    public function getCounts()
    {
        return $this->counts;
    }

    /**
     * Sets Counts.
     *
     * The current counts for all objects referenced in the request.
     *
     * @maps counts
     *
     * @param InventoryCount[]|null $counts
     */
    public function setCounts(array $counts = null)
    {
        $this->counts = $counts;
    }

    /**
     * Returns Changes.
     *
     * Changes created for the request.
     *
     * @return InventoryChange[]|null
     */
    public function getChanges()
    {
        return $this->changes;
    }

    /**
     * Sets Changes.
     *
     * Changes created for the request.
     *
     * @maps changes
     *
     * @param InventoryChange[]|null $changes
     */
    public function setChanges(array $changes = null)
    {
        $this->changes = $changes;
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
            $json['errors']  = $this->errors;
        }
        if (isset($this->counts)) {
            $json['counts']  = $this->counts;
        }
        if (isset($this->changes)) {
            $json['changes'] = $this->changes;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
