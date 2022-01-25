<?php



namespace Square\Models;

class V1ListPaymentsResponse implements \JsonSerializable
{
    /**
     * @var V1Payment[]|null
     */
    private $items;

    /**
     * Returns Items.
     *
     * @return V1Payment[]|null
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Sets Items.
     *
     * @maps items
     *
     * @param V1Payment[]|null $items
     */
    public function setItems(array $items = null)
    {
        $this->items = $items;
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
            $json['items'] = $this->items;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
