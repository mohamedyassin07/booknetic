<?php



namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the `ListCustomers` endpoint.
 *
 * Either `errors` or `customers` is present in a given response (never both).
 */
class ListCustomersResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Customer[]|null
     */
    private $customers;

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
     * Returns Customers.
     *
     * An array of `Customer` objects that match the provided query.
     *
     * @return Customer[]|null
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * Sets Customers.
     *
     * An array of `Customer` objects that match the provided query.
     *
     * @maps customers
     *
     * @param Customer[]|null $customers
     */
    public function setCustomers(array $customers = null)
    {
        $this->customers = $customers;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor to retrieve the next set of results for the
     * original query. A cursor is only present if the request succeeded and additional results
     * are available.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor to retrieve the next set of results for the
     * original query. A cursor is only present if the request succeeded and additional results
     * are available.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
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
            $json['errors']    = $this->errors;
        }
        if (isset($this->customers)) {
            $json['customers'] = $this->customers;
        }
        if (isset($this->cursor)) {
            $json['cursor']    = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
