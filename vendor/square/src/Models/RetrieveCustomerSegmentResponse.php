<?php



namespace Square\Models;

/**
 * Defines the fields that are included in the response body for requests to the
 * `RetrieveCustomerSegment` endpoint.
 *
 * Either `errors` or `segment` is present in a given response (never both).
 */
class RetrieveCustomerSegmentResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var CustomerSegment|null
     */
    private $segment;

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
     * Returns Segment.
     *
     * Represents a group of customer profiles that match one or more predefined filter criteria.
     *
     * Segments (also known as Smart Groups) are defined and created within the Customer Directory in the
     * Square Seller Dashboard or Point of Sale.
     */
    public function getSegment()
    {
        return $this->segment;
    }

    /**
     * Sets Segment.
     *
     * Represents a group of customer profiles that match one or more predefined filter criteria.
     *
     * Segments (also known as Smart Groups) are defined and created within the Customer Directory in the
     * Square Seller Dashboard or Point of Sale.
     *
     * @maps segment
     */
    public function setSegment(CustomerSegment $segment = null)
    {
        $this->segment = $segment;
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
            $json['errors']  = $this->errors;
        }
        if (isset($this->segment)) {
            $json['segment'] = $this->segment;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
