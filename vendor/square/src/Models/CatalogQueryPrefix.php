<?php



namespace Square\Models;

/**
 * The query filter to return the search result whose named attribute values are prefixed by the
 * specified attribute value.
 */
class CatalogQueryPrefix implements \JsonSerializable
{
    /**
     * @var string
     */
    private $attributeName;

    /**
     * @var string
     */
    private $attributePrefix;

    /**
     * @param $attributeName
     * @param $attributePrefix
     */
    public function __construct($attributeName, $attributePrefix)
    {
        $this->attributeName = $attributeName;
        $this->attributePrefix = $attributePrefix;
    }

    /**
     * Returns Attribute Name.
     *
     * The name of the attribute to be searched.
     */
    public function getAttributeName()
    {
        return $this->attributeName;
    }

    /**
     * Sets Attribute Name.
     *
     * The name of the attribute to be searched.
     *
     * @required
     * @maps attribute_name
     */
    public function setAttributeName($attributeName)
    {
        $this->attributeName = $attributeName;
    }

    /**
     * Returns Attribute Prefix.
     *
     * The desired prefix of the search attribute value.
     */
    public function getAttributePrefix()
    {
        return $this->attributePrefix;
    }

    /**
     * Sets Attribute Prefix.
     *
     * The desired prefix of the search attribute value.
     *
     * @required
     * @maps attribute_prefix
     */
    public function setAttributePrefix($attributePrefix)
    {
        $this->attributePrefix = $attributePrefix;
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
        $json['attribute_prefix'] = $this->attributePrefix;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
