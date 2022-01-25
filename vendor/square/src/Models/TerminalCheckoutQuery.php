<?php



namespace Square\Models;

class TerminalCheckoutQuery implements \JsonSerializable
{
    /**
     * @var TerminalCheckoutQueryFilter|null
     */
    private $filter;

    /**
     * @var TerminalCheckoutQuerySort|null
     */
    private $sort;

    /**
     * Returns Filter.
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Sets Filter.
     *
     * @maps filter
     */
    public function setFilter(TerminalCheckoutQueryFilter $filter = null)
    {
        $this->filter = $filter;
    }

    /**
     * Returns Sort.
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Sets Sort.
     *
     * @maps sort
     */
    public function setSort(TerminalCheckoutQuerySort $sort = null)
    {
        $this->sort = $sort;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->filter)) {
            $json['filter'] = $this->filter;
        }
        if (isset($this->sort)) {
            $json['sort']   = $this->sort;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
