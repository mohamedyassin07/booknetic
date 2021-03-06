<?php



namespace Square\Models;

/**
 * Request object for the [ListMerchant]($e/Merchants/ListMerchants) endpoint.
 */
class ListMerchantsRequest implements \JsonSerializable
{
    /**
     * @var int|null
     */
    private $cursor;

    /**
     * Returns Cursor.
     *
     * The cursor generated by the previous response.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The cursor generated by the previous response.
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
        if (isset($this->cursor)) {
            $json['cursor'] = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
