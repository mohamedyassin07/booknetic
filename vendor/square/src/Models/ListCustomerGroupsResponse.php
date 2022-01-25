<?php



namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the [ListCustomerGroups]($e/CustomerGroups/ListCustomerGroups) endpoint.
 *
 * Either `errors` or `groups` is present in a given response (never both).
 */
class ListCustomerGroupsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var CustomerGroup[]|null
     */
    private $groups;

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
     * Returns Groups.
     *
     * A list of customer groups belonging to the current seller.
     *
     * @return CustomerGroup[]|null
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Sets Groups.
     *
     * A list of customer groups belonging to the current seller.
     *
     * @maps groups
     *
     * @param CustomerGroup[]|null $groups
     */
    public function setGroups(array $groups = null)
    {
        $this->groups = $groups;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor to retrieve the next set of results for your
     * original query to the endpoint. This value is present only if the request
     * succeeded and additional results are available.
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
     * A pagination cursor to retrieve the next set of results for your
     * original query to the endpoint. This value is present only if the request
     * succeeded and additional results are available.
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
            $json['errors'] = $this->errors;
        }
        if (isset($this->groups)) {
            $json['groups'] = $this->groups;
        }
        if (isset($this->cursor)) {
            $json['cursor'] = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
