<?php



namespace Square\Models;

/**
 * The query filter to return the search result(s) by exact match of the specified `attribute_name`
 * and any of
 * the `attribute_values`.
 */
class CatalogQuerySet implements \JsonSerializable
{
    /**
     * @var string
     */
    private $attributeName;

    /**
     * @var string[]
     */
    private $attributeValues;

    /**
     * @param $attributeName
     * @param string[] $attributeValues
     */
    public function __construct($attributeName, array $attributeValues)
    {
        $this->attributeName = $attributeName;
        $this->attributeValues = $attributeValues;
    }

    /**
     * Returns Attribute Name.
     *
     * The name of the attribute to be searched. Matching of the attribute name is exact.
     */
    public function getAttributeName()
    {
        return $this->attributeName;
    }

    /**
     * Sets Attribute Name.
     *
     * The name of the attribute to be searched. Matching of the attribute name is exact.
     *
     * @required
     * @maps attribute_name
     */
    public function setAttributeName($attributeName)
    {
        $this->attributeName = $attributeName;
    }

    /**
     * Returns Attribute Values.
     *
     * The desired values of the search attribute. Matching of the attribute values is exact and case
     * insensitive.
     * A maximum of 250 values may be searched in a request.
     *
     * @return string[]
     */
    public function getAttributeValues()
    {
        return $this->attributeValues;
    }

    /**
     * Sets Attribute Values.
     *
     * The desired values of the search attribute. Matching of the attribute values is exact and case
     * insensitive.
     * A maximum of 250 values may be searched in a request.
     *
     * @required
     * @maps attribute_values
     *
     * @param string[] $attributeValues
     */
    public function setAttributeValues(array $attributeValues)
    {
        $this->attributeValues = $attributeValues;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['attribute_name']   = $this->attributeName;
        $json['attribute_values'] = $this->attributeValues;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
