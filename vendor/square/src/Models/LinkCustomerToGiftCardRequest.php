<?php



namespace Square\Models;

/**
 * A request to link a customer to a gift card
 */
class LinkCustomerToGiftCardRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $customerId;

    /**
     * @param $customerId
     */
    public function __construct($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Customer Id.
     *
     * The ID of the customer to be linked.
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The ID of the customer to be linked.
     *
     * @required
     * @maps customer_id
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['customer_id'] = $this->customerId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
