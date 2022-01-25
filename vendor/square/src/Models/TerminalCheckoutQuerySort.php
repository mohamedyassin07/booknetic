<?php



namespace Square\Models;

class TerminalCheckoutQuerySort implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * Returns Sort Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Sets Sort Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
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
