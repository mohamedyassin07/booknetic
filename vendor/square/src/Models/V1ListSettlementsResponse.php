<?php



namespace Square\Models;

class V1ListSettlementsResponse implements \JsonSerializable
{
    /**
     * @var V1Settlement[]|null
     */
    private $items;

    /**
     * Returns Items.
     *
     * @return V1Settlement[]|null
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
     * @param V1Settlement[]|null $items
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
