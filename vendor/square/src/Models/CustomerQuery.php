<?php



namespace Square\Models;

/**
 * Represents a query (including filtering criteria, sorting criteria, or both) used to search
 * for customer profiles.
 */
class CustomerQuery implements \JsonSerializable
{
    /**
     * @var CustomerFilter|null
     */
    private $filter;

    /**
     * @var CustomerSort|null
     */
    private $sort;

    /**
     * Returns Filter.
     *
     * Represents a set of `CustomerQuery` filters used to limit the set of
     * `Customers` returned by `SearchCustomers`.
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Sets Filter.
     *
     * Represents a set of `CustomerQuery` filters used to limit the set of
     * `Customers` returned by `SearchCustomers`.
     *
     * @maps filter
     */
    public function setFilter(CustomerFilter $filter = null)
    {
        $this->filter = $filter;
    }

    /**
     * Returns Sort.
     *
     * Specifies how searched customers profiles are sorted, including the sort key and sort order.
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Sets Sort.
     *
     * Specifies how searched customers profiles are sorted, including the sort key and sort order.
     *
     * @maps sort
     */
    public function setSort(CustomerSort $sort = null)
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
