<?php



namespace Square\Models;

/**
 * Configuration associated with `SELECTION`-type custom attribute definitions.
 */
class CatalogCustomAttributeDefinitionSelectionConfig implements \JsonSerializable
{
    /**
     * @var int|null
     */
    private $maxAllowedSelections;

    /**
     * @var CatalogCustomAttributeDefinitionSelectionConfigCustomAttributeSelection[]|null
     */
    private $allowedSelections;

    /**
     * Returns Max Allowed Selections.
     *
     * The maximum number of selections that can be set. The maximum value for this
     * attribute is 100. The default value is 1. The value can be modified, but changing the value will
     * not
     * affect existing custom attribute values on objects. Clients need to
     * handle custom attributes with more selected values than allowed by this limit.
     */
    public function getMaxAllowedSelections()
    {
        return $this->maxAllowedSelections;
    }

    /**
     * Sets Max Allowed Selections.
     *
     * The maximum number of selections that can be set. The maximum value for this
     * attribute is 100. The default value is 1. The value can be modified, but changing the value will
     * not
     * affect existing custom attribute values on objects. Clients need to
     * handle custom attributes with more selected values than allowed by this limit.
     *
     * @maps max_allowed_selections
     */
    public function setMaxAllowedSelections($maxAllowedSelections = null)
    {
        $this->maxAllowedSelections = $maxAllowedSelections;
    }

    /**
     * Returns Allowed Selections.
     *
     * The set of valid `CatalogCustomAttributeSelections`. Up to a maximum of 100
     * selections can be defined. Can be modified.
     *
     * @return CatalogCustomAttributeDefinitionSelectionConfigCustomAttributeSelection[]|null
     */
    public function getAllowedSelections()
    {
        return $this->allowedSelections;
    }

    /**
     * Sets Allowed Selections.
     *
     * The set of valid `CatalogCustomAttributeSelections`. Up to a maximum of 100
     * selections can be defined. Can be modified.
     *
     * @maps allowed_selections
     *
     * @param CatalogCustomAttributeDefinitionSelectionConfigCustomAttributeSelection[]|null $allowedSelections
     */
    public function setAllowedSelections(array $allowedSelections = null)
    {
        $this->allowedSelections = $allowedSelections;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->maxAllowedSelections)) {
            $json['max_allowed_selections'] = $this->maxAllowedSelections;
        }
        if (isset($this->allowedSelections)) {
            $json['allowed_selections']     = $this->allowedSelections;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
