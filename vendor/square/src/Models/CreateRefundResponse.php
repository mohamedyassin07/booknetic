<?php



namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the [CreateRefund]($e/Transactions/CreateRefund) endpoint.
 *
 * One of `errors` or `refund` is present in a given response (never both).
 */
class CreateRefundResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Refund|null
     */
    private $refund;

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
     * Returns Refund.
     *
     * Represents a refund processed for a Square transaction.
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * Sets Refund.
     *
     * Represents a refund processed for a Square transaction.
     *
     * @maps refund
     */
    public function setRefund(Refund $refund = null)
    {
        $this->refund = $refund;
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
            $json['errors'] = $this->errors;
        }
        if (isset($this->refund)) {
            $json['refund'] = $this->refund;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
