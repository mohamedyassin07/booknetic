<?php



namespace Square\Models;

/**
 * Defines the response returned by [ListPayments]($e/Payments/ListPayments).
 */
class ListPaymentsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Payment[]|null
     */
    private $payments;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Errors.
     *
     * Information about errors encountered during the request.
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
     * Information about errors encountered during the request.
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
     * Returns Payments.
     *
     * The requested list of payments.
     *
     * @return Payment[]|null
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * Sets Payments.
     *
     * The requested list of payments.
     *
     * @maps payments
     *
     * @param Payment[]|null $payments
     */
    public function setPayments(array $payments = null)
    {
        $this->payments = $payments;
    }

    /**
     * Returns Cursor.
     *
     * The pagination cursor to be used in a subsequent request. If empty,
     * this is the final response.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination).
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The pagination cursor to be used in a subsequent request. If empty,
     * this is the final response.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination).
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
            $json['errors']   = $this->errors;
        }
        if (isset($this->payments)) {
            $json['payments'] = $this->payments;
        }
        if (isset($this->cursor)) {
            $json['cursor']   = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
