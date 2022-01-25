<?php



namespace Square\Models;

/**
 * A request to unlink a customer to a gift card
 */
class UnlinkCustomerFromGiftCardRequest implements \JsonSerializable
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
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
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
