<?php



namespace Square\Models;

/**
 * The response object returned by the [ListMerchant]($e/Merchants/ListMerchants) endpoint.
 */
class ListMerchantsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Merchant[]|null
     */
    private $merchant;

    /**
     * @var int|null
     */
    private $cursor;

    /**
     * Returns Errors.
     *
     * Information on errors encountered during the request.
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
     * Information on errors encountered during the request.
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
     * Returns Merchant.
     *
     * The requested `Merchant` entities.
     *
     * @return Merchant[]|null
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * Sets Merchant.
     *
     * The requested `Merchant` entities.
     *
     * @maps merchant
     *
     * @param Merchant[]|null $merchant
     */
    public function setMerchant(array $merchant = null)
    {
        $this->merchant = $merchant;
    }

    /**
     * Returns Cursor.
     *
     * If the  response is truncated, the cursor to use in next  request to fetch next set of objects.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * If the  response is truncated, the cursor to use in next  request to fetch next set of objects.
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
        if (isset($this->merchant)) {
            $json['merchant'] = $this->merchant;
        }
        if (isset($this->cursor)) {
            $json['cursor']   = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
