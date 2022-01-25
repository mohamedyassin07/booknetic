<?php



namespace Square\Models;

/**
 * An instance of a custom attribute. Custom attributes can be defined and
 * added to `ITEM` and `ITEM_VARIATION` type catalog objects.
 * [Read more about custom attributes](https://developer.squareup.com/docs/catalog-api/add-custom-
 * attributes).
 */
class CatalogCustomAttributeValue implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $stringValue;

    /**
     * @var string|null
     */
    private $customAttributeDefinitionId;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $numberValue;

    /**
     * @var bool|null
     */
    private $booleanValue;

    /**
     * @var string[]|null
     */
    private $selectionUidValues;

    /**
     * @var string|null
     */
    private $key;

    /**
     * Returns Name.
     *
     * The name of the custom attribute.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the custom attribute.
     *
     * @maps name
     */
    public function setName($name = null)
    {
        $this->name = $name;
    }

    /**
     * Returns String Value.
     *
     * The string value of the custom attribute.  Populated if `type` = `STRING`.
     */
    public function getStringValue()
    {
        return $this->stringValue;
    }

    /**
     * Sets String Value.
     *
     * The string value of the custom attribute.  Populated if `type` = `STRING`.
     *
     * @maps string_value
     */
    public function setStringValue($stringValue = null)
    {
        $this->stringValue = $stringValue;
    }

    /**
     * Returns Custom Attribute Definition Id.
     *
     * __Read-only.__ The id of the [CatalogCustomAttributeDefinition]($m/CatalogCustomAttributeDefinition)
     * this value belongs to.
     */
    public function getCustomAttributeDefinitionId()
    {
        return $this->customAttributeDefinitionId;
    }

    /**
     * Sets Custom Attribute Definition Id.
     *
     * __Read-only.__ The id of the [CatalogCustomAttributeDefinition]($m/CatalogCustomAttributeDefinition)
     * this value belongs to.
     *
     * @maps custom_attribute_definition_id
     */
    public function setCustomAttributeDefinitionId($customAttributeDefinitionId = null)
    {
        $this->customAttributeDefinitionId = $customAttributeDefinitionId;
    }

    /**
     * Returns Type.
     *
     * Defines the possible types for a custom attribute.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Defines the possible types for a custom attribute.
     *
     * @maps type
     */
    public function setType($type = null)
    {
        $this->type = $type;
    }

    /**
     * Returns Number Value.
     *
     * Populated if `type` = `NUMBER`. Contains a string
     * representation of a decimal number, using a `.` as the decimal separator.
     */
    public function getNumberValue()
    {
        return $this->numberValue;
    }

    /**
     * Sets Number Value.
     *
     * Populated if `type` = `NUMBER`. Contains a string
     * representation of a decimal number, using a `.` as the decimal separator.
     *
     * @maps number_value
     */
    public function setNumberValue($numberValue = null)
    {
        $this->numberValue = $numberValue;
    }

    /**
     * Returns Boolean Value.
     *
     * A `true` or `false` value. Populated if `type` = `BOOLEAN`.
     */
    public function getBooleanValue()
    {
        return $this->booleanValue;
    }

    /**
     * Sets Boolean Value.
     *
     * A `true` or `false` value. Populated if `type` = `BOOLEAN`.
     *
     * @maps boolean_value
     */
    public function setBooleanValue($booleanValue = null)
    {
        $this->booleanValue = $booleanValue;
    }

    /**
     * Returns Selection Uid Values.
     *
     * One or more choices from `allowed_selections`. Populated if `type` = `SELECTION`.
     *
     * @return string[]|null
     */
    public function getSelectionUidValues()
    {
        return $this->selectionUidValues;
    }

    /**
     * Sets Selection Uid Values.
     *
     * One or more choices from `allowed_selections`. Populated if `type` = `SELECTION`.
     *
     * @maps selection_uid_values
     *
     * @param string[]|null $selectionUidValues
     */
    public function setSelectionUidValues(array $selectionUidValues = null)
    {
        $this->selectionUidValues = $selectionUidValues;
    }

    /**
     * Returns Key.
     *
     * __Read-only.__ A copy of key from the associated `CatalogCustomAttributeDefinition`.
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Sets Key.
     *
     * __Read-only.__ A copy of key from the associated `CatalogCustomAttributeDefinition`.
     *
     * @maps key
     */
    public function setKey($key = null)
    {
        $this->key = $key;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->name)) {
            $json['name']                           = $this->name;
        }
        if (isset($this->stringValue)) {
            $json['string_value']                   = $this->stringValue;
        }
        if (isset($this->customAttributeDefinitionId)) {
            $json['custom_attribute_definition_id'] = $this->customAttributeDefinitionId;
        }
        if (isset($this->type)) {
            $json['type']                           = $this->type;
        }
        if (isset($this->numberValue)) {
            $json['number_value']                   = $this->numberValue;
        }
        if (isset($this->booleanValue)) {
            $json['boolean_value']                  = $this->booleanValue;
        }
        if (isset($this->selectionUidValues)) {
            $json['selection_uid_values']           = $this->selectionUidValues;
        }
        if (isset($this->key)) {
            $json['key']                            = $this->key;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
