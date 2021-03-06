<?php



namespace Square\Models;

/**
 * A query composed of one or more different types of filters to narrow the scope of targeted objects
 * when calling the `SearchCatalogObjects` endpoint.
 *
 * Although a query can have multiple filters, only certain query types can be combined per call to
 * [SearchCatalogObjects]($e/Catalog/SearchCatalogObjects).
 * Any combination of the following types may be used together:
 * - [exact_query]($m/CatalogQueryExact)
 * - [prefix_query]($m/CatalogQueryPrefix)
 * - [range_query]($m/CatalogQueryRange)
 * - [sorted_attribute_query]($m/CatalogQuerySortedAttribute)
 * - [text_query]($m/CatalogQueryText)
 * All other query types cannot be combined with any others.
 *
 * When a query filter is based on an attribute, the attribute must be searchable.
 * Searchable attributes are listed as follows, along their parent types that can be searched for with
 * applicable query filters.
 *
 * * Searchable attribute and objects queryable by searchable attributes **
 * - `name`:  `CatalogItem`, `CatalogItemVariation`, `CatalogCategory`, `CatalogTax`, `CatalogDiscount`,
 * `CatalogModifier`, 'CatalogModifierList`, `CatalogItemOption`, `CatalogItemOptionValue`
 * - `description`: `CatalogItem`, `CatalogItemOptionValue`
 * - `abbreviation`: `CatalogItem`
 * - `upc`: `CatalogItemVariation`
 * - `sku`: `CatalogItemVariation`
 * - `caption`: `CatalogImage`
 * - `display_name`: `CatalogItemOption`
 *
 * For example, to search for [CatalogItem]($m/CatalogItem) objects by searchable attributes, you can
 * use
 * the `"name"`, `"description"`, or `"abbreviation"` attribute in an applicable query filter.
 */
class CatalogQuery implements \JsonSerializable
{
    /**
     * @var CatalogQuerySortedAttribute|null
     */
    private $sortedAttributeQuery;

    /**
     * @var CatalogQueryExact|null
     */
    private $exactQuery;

    /**
     * @var CatalogQuerySet|null
     */
    private $setQuery;

    /**
     * @var CatalogQueryPrefix|null
     */
    private $prefixQuery;

    /**
     * @var CatalogQueryRange|null
     */
    private $rangeQuery;

    /**
     * @var CatalogQueryText|null
     */
    private $textQuery;

    /**
     * @var CatalogQueryItemsForTax|null
     */
    private $itemsForTaxQuery;

    /**
     * @var CatalogQueryItemsForModifierList|null
     */
    private $itemsForModifierListQuery;

    /**
     * @var CatalogQueryItemsForItemOptions|null
     */
    private $itemsForItemOptionsQuery;

    /**
     * @var CatalogQueryItemVariationsForItemOptionValues|null
     */
    private $itemVariationsForItemOptionValuesQuery;

    /**
     * Returns Sorted Attribute Query.
     *
     * The query expression to specify the key to sort search results.
     */
    public function getSortedAttributeQuery()
    {
        return $this->sortedAttributeQuery;
    }

    /**
     * Sets Sorted Attribute Query.
     *
     * The query expression to specify the key to sort search results.
     *
     * @maps sorted_attribute_query
     */
    public function setSortedAttributeQuery(CatalogQuerySortedAttribute $sortedAttributeQuery = null)
    {
        $this->sortedAttributeQuery = $sortedAttributeQuery;
    }

    /**
     * Returns Exact Query.
     *
     * The query filter to return the search result by exact match of the specified attribute name and
     * value.
     */
    public function getExactQuery()
    {
        return $this->exactQuery;
    }

    /**
     * Sets Exact Query.
     *
     * The query filter to return the search result by exact match of the specified attribute name and
     * value.
     *
     * @maps exact_query
     */
    public function setExactQuery(CatalogQueryExact $exactQuery = null)
    {
        $this->exactQuery = $exactQuery;
    }

    /**
     * Returns Set Query.
     *
     * The query filter to return the search result(s) by exact match of the specified `attribute_name` and
     * any of
     * the `attribute_values`.
     */
    public function getSetQuery()
    {
        return $this->setQuery;
    }

    /**
     * Sets Set Query.
     *
     * The query filter to return the search result(s) by exact match of the specified `attribute_name` and
     * any of
     * the `attribute_values`.
     *
     * @maps set_query
     */
    public function setSetQuery(CatalogQuerySet $setQuery = null)
    {
        $this->setQuery = $setQuery;
    }

    /**
     * Returns Prefix Query.
     *
     * The query filter to return the search result whose named attribute values are prefixed by the
     * specified attribute value.
     */
    public function getPrefixQuery()
    {
        return $this->prefixQuery;
    }

    /**
     * Sets Prefix Query.
     *
     * The query filter to return the search result whose named attribute values are prefixed by the
     * specified attribute value.
     *
     * @maps prefix_query
     */
    public function setPrefixQuery(CatalogQueryPrefix $prefixQuery = null)
    {
        $this->prefixQuery = $prefixQuery;
    }

    /**
     * Returns Range Query.
     *
     * The query filter to return the search result whose named attribute values fall between the specified
     * range.
     */
    public function getRangeQuery()
    {
        return $this->rangeQuery;
    }

    /**
     * Sets Range Query.
     *
     * The query filter to return the search result whose named attribute values fall between the specified
     * range.
     *
     * @maps range_query
     */
    public function setRangeQuery(CatalogQueryRange $rangeQuery = null)
    {
        $this->rangeQuery = $rangeQuery;
    }

    /**
     * Returns Text Query.
     *
     * The query filter to return the search result whose searchable attribute values contain all of the
     * specified keywords or tokens, independent of the token order or case.
     */
    public function getTextQuery()
    {
        return $this->textQuery;
    }

    /**
     * Sets Text Query.
     *
     * The query filter to return the search result whose searchable attribute values contain all of the
     * specified keywords or tokens, independent of the token order or case.
     *
     * @maps text_query
     */
    public function setTextQuery(CatalogQueryText $textQuery = null)
    {
        $this->textQuery = $textQuery;
    }

    /**
     * Returns Items for Tax Query.
     *
     * The query filter to return the items containing the specified tax IDs.
     */
    public function getItemsForTaxQuery()
    {
        return $this->itemsForTaxQuery;
    }

    /**
     * Sets Items for Tax Query.
     *
     * The query filter to return the items containing the specified tax IDs.
     *
     * @maps items_for_tax_query
     */
    public function setItemsForTaxQuery(CatalogQueryItemsForTax $itemsForTaxQuery = null)
    {
        $this->itemsForTaxQuery = $itemsForTaxQuery;
    }

    /**
     * Returns Items for Modifier List Query.
     *
     * The query filter to return the items containing the specified modifier list IDs.
     */
    public function getItemsForModifierListQuery()
    {
        return $this->itemsForModifierListQuery;
    }

    /**
     * Sets Items for Modifier List Query.
     *
     * The query filter to return the items containing the specified modifier list IDs.
     *
     * @maps items_for_modifier_list_query
     */
    public function setItemsForModifierListQuery(CatalogQueryItemsForModifierList $itemsForModifierListQuery = null)
    {
        $this->itemsForModifierListQuery = $itemsForModifierListQuery;
    }

    /**
     * Returns Items for Item Options Query.
     *
     * The query filter to return the items containing the specified item option IDs.
     */
    public function getItemsForItemOptionsQuery()
    {
        return $this->itemsForItemOptionsQuery;
    }

    /**
     * Sets Items for Item Options Query.
     *
     * The query filter to return the items containing the specified item option IDs.
     *
     * @maps items_for_item_options_query
     */
    public function setItemsForItemOptionsQuery(CatalogQueryItemsForItemOptions $itemsForItemOptionsQuery = null)
    {
        $this->itemsForItemOptionsQuery = $itemsForItemOptionsQuery;
    }

    /**
     * Returns Item Variations for Item Option Values Query.
     *
     * The query filter to return the item variations containing the specified item option value IDs.
     */
    public function getItemVariationsForItemOptionValuesQuery()
    {
        return $this->itemVariationsForItemOptionValuesQuery;
    }

    /**
     * Sets Item Variations for Item Option Values Query.
     *
     * The query filter to return the item variations containing the specified item option value IDs.
     *
     * @maps item_variations_for_item_option_values_query
     */
    public function setItemVariationsForItemOptionValuesQuery(
        CatalogQueryItemVariationsForItemOptionValues $itemVariationsForItemOptionValuesQuery = null
    ) {
        $this->itemVariationsForItemOptionValuesQuery = $itemVariationsForItemOptionValuesQuery;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->sortedAttributeQuery)) {
            $json['sorted_attribute_query']                       = $this->sortedAttributeQuery;
        }
        if (isset($this->exactQuery)) {
            $json['exact_query']                                  = $this->exactQuery;
        }
        if (isset($this->setQuery)) {
            $json['set_query']                                    = $this->setQuery;
        }
        if (isset($this->prefixQuery)) {
            $json['prefix_query']                                 = $this->prefixQuery;
        }
        if (isset($this->rangeQuery)) {
            $json['range_query']                                  = $this->rangeQuery;
        }
        if (isset($this->textQuery)) {
            $json['text_query']                                   = $this->textQuery;
        }
        if (isset($this->itemsForTaxQuery)) {
            $json['items_for_tax_query']                          = $this->itemsForTaxQuery;
        }
        if (isset($this->itemsForModifierListQuery)) {
            $json['items_for_modifier_list_query']                = $this->itemsForModifierListQuery;
        }
        if (isset($this->itemsForItemOptionsQuery)) {
            $json['items_for_item_options_query']                 = $this->itemsForItemOptionsQuery;
        }
        if (isset($this->itemVariationsForItemOptionValuesQuery)) {
            $json['item_variations_for_item_option_values_query'] = $this->itemVariationsForItemOptionValuesQuery;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
