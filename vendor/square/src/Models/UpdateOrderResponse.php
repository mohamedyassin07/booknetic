<?php



namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the [UpdateOrder]($e/Orders/UpdateOrder) endpoint.
 */
class UpdateOrderResponse implements \JsonSerializable
{
    /**
     * @var Order|null
     */
    private $order;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Order.
     *
     * Contains all information related to a single order to process with Square,
     * including line items that specify the products to purchase. `Order` objects also
     * include information about any associated tenders, refunds, and returns.
     *
     * All Connect V2 Transactions have all been converted to Orders including all associated
     * itemization data.
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Sets Order.
     *
     * Contains all information related to a single order to process with Square,
     * including line items that specify the products to purchase. `Order` objects also
     * include information about any associated tenders, refunds, and returns.
     *
     * All Connect V2 Transactions have all been converted to Orders including all associated
     * itemization data.
     *
     * @maps order
     */
    public function setOrder(Order $order = null)
    {
        $this->order = $order;
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
        if (isset($this->order)) {
            $json['order']  = $this->order;
        }
        if (isset($this->errors)) {
            $json['errors'] = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
