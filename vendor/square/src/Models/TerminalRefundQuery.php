<?php



namespace Square\Models;

class TerminalRefundQuery implements \JsonSerializable
{
    /**
     * @var TerminalRefundQueryFilter|null
     */
    private $filter;

    /**
     * @var TerminalRefundQuerySort|null
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
    public function setFilter(TerminalRefundQueryFilter $filter = null)
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
    public function setSort(TerminalRefundQuerySort $sort = null)
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
