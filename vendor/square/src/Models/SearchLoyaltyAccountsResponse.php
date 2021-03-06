<?php



namespace Square\Models;

/**
 * A response that includes loyalty accounts that satisfy the search criteria.
 */
class SearchLoyaltyAccountsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var LoyaltyAccount[]|null
     */
    private $loyaltyAccounts;

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
     * Returns Loyalty Accounts.
     *
     * The loyalty accounts that met the search criteria,
     * in order of creation date.
     *
     * @return LoyaltyAccount[]|null
     */
    public function getLoyaltyAccounts()
    {
        return $this->loyaltyAccounts;
    }

    /**
     * Sets Loyalty Accounts.
     *
     * The loyalty accounts that met the search criteria,
     * in order of creation date.
     *
     * @maps loyalty_accounts
     *
     * @param LoyaltyAccount[]|null $loyaltyAccounts
     */
    public function setLoyaltyAccounts(array $loyaltyAccounts = null)
    {
        $this->loyaltyAccounts = $loyaltyAccounts;
    }

    /**
     * Returns Cursor.
     *
     * The pagination cursor to use in a subsequent
     * request. If empty, this is the final response.
     * For more information,
     * see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination).
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The pagination cursor to use in a subsequent
     * request. If empty, this is the final response.
     * For more information,
     * see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination).
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
            $json['errors']           = $this->errors;
        }
        if (isset($this->loyaltyAccounts)) {
            $json['loyalty_accounts'] = $this->loyaltyAccounts;
        }
        if (isset($this->cursor)) {
            $json['cursor']           = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
