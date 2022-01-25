<?php



namespace Square\Models;

class ListCashDrawerShiftsResponse implements \JsonSerializable
{
    /**
     * @var CashDrawerShiftSummary[]|null
     */
    private $items;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Items.
     *
     * A collection of CashDrawerShiftSummary objects for shifts that match
     * the query.
     *
     * @return CashDrawerShiftSummary[]|null
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Sets Items.
     *
     * A collection of CashDrawerShiftSummary objects for shifts that match
     * the query.
     *
     * @maps items
     *
     * @param CashDrawerShiftSummary[]|null $items
     */
    public function setItems(array $items = null)
    {
        $this->items = $items;
    }

    /**
     * Returns Cursor.
     *
     * Opaque cursor for fetching the next page of results. Cursor is not
     * present in the last page of results.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Opaque cursor for fetching the next page of results. Cursor is not
     * present in the last page of results.
     *
     * @maps cursor
     */
    public function setCursor($cursor = null)
    {
        $this->cursor = $cursor;
    }

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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->items)) {
            $json['items']  = $this->items;
        }
        if (isset($this->cursor)) {
            $json['cursor'] = $this->cursor;
        }
        if (isset($this->errors)) {
            $json['errors'] = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
