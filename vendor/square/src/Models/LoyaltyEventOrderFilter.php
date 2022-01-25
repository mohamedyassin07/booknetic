<?php



namespace Square\Models;

/**
 * Filter events by the order associated with the event.
 */
class LoyaltyEventOrderFilter implements \JsonSerializable
{
    /**
     * @var string
     */
    private $orderId;

    /**
     * @param $orderId
     */
    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Returns Order Id.
     *
     * The ID of the [order]($m/Order) associated with the event.
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The ID of the [order]($m/Order) associated with the event.
     *
     * @required
     * @maps order_id
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['order_id'] = $this->orderId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
