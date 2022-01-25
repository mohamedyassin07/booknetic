<?php



namespace Square\Models;

/**
 * Identifies the sort field and sort order.
 */
class InvoiceSort implements \JsonSerializable
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var string|null
     */
    private $order;

    /**
     * @param $field
     */
    public function __construct($field)
    {
        $this->field = $field;
    }

    /**
     * Returns Field.
     *
     * The field to use for sorting.
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Sets Field.
     *
     * The field to use for sorting.
     *
     * @required
     * @maps field
     */
    public function setField($field)
    {
        $this->field = $field;
    }

    /**
     * Returns Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Sets Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     *
     * @maps order
     */
    public function setOrder($order = null)
    {
        $this->order = $order;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['field']     = $this->field;
        if (isset($this->order)) {
            $json['order'] = $this->order;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
