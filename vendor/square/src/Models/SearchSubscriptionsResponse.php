<?php



namespace Square\Models;

/**
 * Defines the fields that are included in the response from the
 * [SearchSubscriptions]($e/Subscriptions/SearchSubscriptions) endpoint.
 */
class SearchSubscriptionsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Subscription[]|null
     */
    private $subscriptions;

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
     * Returns Subscriptions.
     *
     * The search result.
     *
     * @return Subscription[]|null
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * Sets Subscriptions.
     *
     * The search result.
     *
     * @maps subscriptions
     *
     * @param Subscription[]|null $subscriptions
     */
    public function setSubscriptions(array $subscriptions = null)
    {
        $this->subscriptions = $subscriptions;
    }

    /**
     * Returns Cursor.
     *
     * When a response is truncated, it includes a cursor that you can
     * use in a subsequent request to fetch the next set of subscriptions.
     * If empty, this is the final response.
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
     * When a response is truncated, it includes a cursor that you can
     * use in a subsequent request to fetch the next set of subscriptions.
     * If empty, this is the final response.
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
            $json['errors']        = $this->errors;
        }
        if (isset($this->subscriptions)) {
            $json['subscriptions'] = $this->subscriptions;
        }
        if (isset($this->cursor)) {
            $json['cursor']        = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
