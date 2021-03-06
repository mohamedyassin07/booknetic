<?php



namespace Square\Models;

/**
 * Defines the fields that are included in the response body for requests to the
 * `ListCustomerSegments` endpoint.
 *
 * Either `errors` or `segments` is present in a given response (never both).
 */
class ListCustomerSegmentsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var CustomerSegment[]|null
     */
    private $segments;

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
     * Returns Segments.
     *
     * The list of customer segments belonging to the associated Square account.
     *
     * @return CustomerSegment[]|null
     */
    public function getSegments()
    {
        return $this->segments;
    }

    /**
     * Sets Segments.
     *
     * The list of customer segments belonging to the associated Square account.
     *
     * @maps segments
     *
     * @param CustomerSegment[]|null $segments
     */
    public function setSegments(array $segments = null)
    {
        $this->segments = $segments;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor to be used in subsequent calls to `ListCustomerSegments`
     * to retrieve the next set of query results. The cursor is only present if the request succeeded and
     * additional results are available.
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
     * A pagination cursor to be used in subsequent calls to `ListCustomerSegments`
     * to retrieve the next set of query results. The cursor is only present if the request succeeded and
     * additional results are available.
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
            $json['errors']   = $this->errors;
        }
        if (isset($this->segments)) {
            $json['segments'] = $this->segments;
        }
        if (isset($this->cursor)) {
            $json['cursor']   = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
