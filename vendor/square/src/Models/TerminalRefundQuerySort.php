<?php



namespace Square\Models;

class TerminalRefundQuerySort implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * Returns Sort Order.
     *
     * The order in which results are listed.
     * - `ASC` - Oldest to newest.
     * - `DESC` - Newest to oldest (default).
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Sets Sort Order.
     *
     * The order in which results are listed.
     * - `ASC` - Oldest to newest.
     * - `DESC` - Newest to oldest (default).
     *
     * @maps sort_order
     */
    public function setSortOrder($sortOrder = null)
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->sortOrder)) {
            $json['sort_order'] = $this->sortOrder;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
