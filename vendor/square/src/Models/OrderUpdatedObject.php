<?php



namespace Square\Models;

class OrderUpdatedObject implements \JsonSerializable
{
    /**
     * @var OrderUpdated|null
     */
    private $orderUpdated;

    /**
     * Returns Order Updated.
     */
    public function getOrderUpdated()
    {
        return $this->orderUpdated;
    }

    /**
     * Sets Order Updated.
     *
     * @maps order_updated
     */
    public function setOrderUpdated(OrderUpdated $orderUpdated = null)
    {
        $this->orderUpdated = $orderUpdated;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->orderUpdated)) {
            $json['order_updated'] = $this->orderUpdated;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
