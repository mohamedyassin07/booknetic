<?php



namespace Square\Models;

/**
 * Defines the request body for the [SearchCatalogItems]($e/Catalog/SearchCatalogItems) endpoint.
 */
class SearchCatalogItemsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $textFilter;

    /**
     * @var string[]|null
     */
    private $categoryIds;

    /**
     * @var string[]|null
     */
    private $stockLevels;

    /**
     * @var string[]|null
     */
    private $enabledLocationIds;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * @var string[]|null
     */
    private $productTypes;

    /**
     * @var CustomAttributeFilter[]|null
     */
    private $customAttributeFilters;

    /**
     * Returns Text Filter.
     *
     * The text filter expression to return items or item variations containing specified text in
     * the `name`, `description`, or `abbreviation` attribute value of an item, or in
     * the `name`, `sku`, or `upc` attribute value of an item variation.
     */
    public function getTextFilter()
    {
        return $this->textFilter;
    }

    /**
     * Sets Text Filter.
     *
     * The text filter expression to return items or item variations containing specified text in
     * the `name`, `description`, or `abbreviation` attribute value of an item, or in
     * the `name`, `sku`, or `upc` attribute value of an item variation.
     *
     * @maps text_filter
     */
    public function setTextFilter($textFilter = null)
    {
        $this->textFilter = $textFilter;
    }

    /**
     * Returns Category Ids.
     *
     * The category id query expression to return items containing the specified category IDs.
     *
     * @return string[]|null
     */
    public function getCategoryIds()
    {
        return $this->categoryIds;
    }

    /**
     * Sets Category Ids.
     *
     * The category id query expression to return items containing the specified category IDs.
     *
     * @maps category_ids
     *
     * @param string[]|null $categoryIds
     */
    public function setCategoryIds(array $categoryIds = null)
    {
        $this->categoryIds = $categoryIds;
    }

    /**
     * Returns Stock Levels.
     *
     * The stock-level query expression to return item variations with the specified stock levels.
     * See [SearchCatalogItemsRequestStockLevel](#type-searchcatalogitemsrequeststocklevel) for possible
     * values
     *
     * @return string[]|null
     */
    public function getStockLevels()
    {
        return $this->stockLevels;
    }

    /**
     * Sets Stock Levels.
     *
     * The stock-level query expression to return item variations with the specified stock levels.
     * See [SearchCatalogItemsRequestStockLevel](#type-searchcatalogitemsrequeststocklevel) for possible
     * values
     *
     * @maps stock_levels
     *
     * @param string[]|null $stockLevels
     */
    public function setStockLevels(array $stockLevels = null)
    {
        $this->stockLevels = $stockLevels;
    }

    /**
     * Returns Enabled Location Ids.
     *
     * The enabled-location query expression to return items and item variations having specified enabled
     * locations.
     *
     * @return string[]|null
     */
    public function getEnabledLocationIds()
    {
        return $this->enabledLocationIds;
    }

    /**
     * Sets Enabled Location Ids.
     *
     * The enabled-location query expression to return items and item variations having specified enabled
     * locations.
     *
     * @maps enabled_location_ids
     *
     * @param string[]|null $enabledLocationIds
     */
    public function setEnabledLocationIds(array $enabledLocationIds = null)
    {
        $this->enabledLocationIds = $enabledLocationIds;
    }

    /**
     * Returns Cursor.
     *
     * The pagination token, returned in the previous response, used to fetch the next batch of pending
     * results.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The pagination token, returned in the previous response, used to fetch the next batch of pending
     * results.
     *
     * @maps cursor
     */
    public function setCursor($cursor = null)
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Limit.
     *
     * The maximum number of results to return per page. The default value is 100.
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of results to return per page. The default value is 100.
     *
     * @maps limit
     */
    public function setLimit($limit = null)
    {
        $this->limit = $limit;
    }

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
     * Returns Product Types.
     *
     * The product types query expression to return items or item variations having the specified product
     * types.
     *
     * @return string[]|null
     */
    public function getProductTypes()
    {
        return $this->productTypes;
    }

    /**
     * Sets Product Types.
     *
     * The product types query expression to return items or item variations having the specified product
     * types.
     *
     * @maps product_types
     *
     * @param string[]|null $productTypes
     */
    public function setProductTypes(array $productTypes = null)
    {
        $this->productTypes = $productTypes;
    }

    /**
     * Returns Custom Attribute Filters.
     *
     * The customer-attribute filter to return items or item variations matching the specified
     * custom attribute expressions. A maximum number of 10 custom attribute expressions are supported in
     * a single call to the [SearchCatalogItems]($e/Catalog/SearchCatalogItems) endpoint.
     *
     * @return CustomAttributeFilter[]|null
     */
    public function getCustomAttributeFilters()
    {
        return $this->customAttributeFilters;
    }

    /**
     * Sets Custom Attribute Filters.
     *
     * The customer-attribute filter to return items or item variations matching the specified
     * custom attribute expressions. A maximum number of 10 custom attribute expressions are supported in
     * a single call to the [SearchCatalogItems]($e/Catalog/SearchCatalogItems) endpoint.
     *
     * @maps custom_attribute_filters
     *
     * @param CustomAttributeFilter[]|null $customAttributeFilters
     */
    public function setCustomAttributeFilters(array $customAttributeFilters = null)
    {
        $this->customAttributeFilters = $customAttributeFilters;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->textFilter)) {
            $json['text_filter']              = $this->textFilter;
        }
        if (isset($this->categoryIds)) {
            $json['category_ids']             = $this->categoryIds;
        }
        if (isset($this->stockLevels)) {
            $json['stock_levels']             = $this->stockLevels;
        }
        if (isset($this->enabledLocationIds)) {
            $json['enabled_location_ids']     = $this->enabledLocationIds;
        }
        if (isset($this->cursor)) {
            $json['cursor']                   = $this->cursor;
        }
        if (isset($this->limit)) {
            $json['limit']                    = $this->limit;
        }
        if (isset($this->sortOrder)) {
            $json['sort_order']               = $this->sortOrder;
        }
        if (isset($this->productTypes)) {
            $json['product_types']            = $this->productTypes;
        }
        if (isset($this->customAttributeFilters)) {
            $json['custom_attribute_filters'] = $this->customAttributeFilters;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
