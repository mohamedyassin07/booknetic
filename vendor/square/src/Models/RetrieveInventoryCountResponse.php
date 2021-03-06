<?php



namespace Square\Models;

class RetrieveInventoryCountResponse implements \JsonSerializable
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
     * @var string|null
     */
    private $cursor;

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
     * The current calculated inventory counts for the requested object and
     * locations.
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
     * The current calculated inventory counts for the requested object and
     * locations.
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
     * Returns Cursor.
     *
     * The pagination cursor to be used in a subsequent request. If unset,
     * this is the final response.
     *
     * See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for
     * more information.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The pagination cursor to be used in a subsequent request. If unset,
     * this is the final response.
     *
     * See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for
     * more information.
     *
     * @maps cursor
     */
    public function setCursor($cursor = null)
    {
        $this->cursor = $cursor;
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
            $json['errors'] = $this->errors;
        }
        if (isset($this->counts)) {
            $json['counts'] = $this->counts;
        }
        if (isset($this->cursor)) {
            $json['cursor'] = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
