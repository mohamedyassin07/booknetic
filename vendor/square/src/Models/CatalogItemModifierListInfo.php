<?php



namespace Square\Models;

/**
 * Options to control the properties of a `CatalogModifierList` applied to a `CatalogItem` instance.
 */
class CatalogItemModifierListInfo implements \JsonSerializable
{
    /**
     * @var string
     */
    private $modifierListId;

    /**
     * @var CatalogModifierOverride[]|null
     */
    private $modifierOverrides;

    /**
     * @var int|null
     */
    private $minSelectedModifiers;

    /**
     * @var int|null
     */
    private $maxSelectedModifiers;

    /**
     * @var bool|null
     */
    private $enabled;

    /**
     * @param $modifierListId
     */
    public function __construct($modifierListId)
    {
        $this->modifierListId = $modifierListId;
    }

    /**
     * Returns Modifier List Id.
     *
     * The ID of the `CatalogModifierList` controlled by this `CatalogModifierListInfo`.
     */
    public function getModifierListId()
    {
        return $this->modifierListId;
    }

    /**
     * Sets Modifier List Id.
     *
     * The ID of the `CatalogModifierList` controlled by this `CatalogModifierListInfo`.
     *
     * @required
     * @maps modifier_list_id
     */
    public function setModifierListId($modifierListId)
    {
        $this->modifierListId = $modifierListId;
    }

    /**
     * Returns Modifier Overrides.
     *
     * A set of `CatalogModifierOverride` objects that override whether a given `CatalogModifier` is
     * enabled by default.
     *
     * @return CatalogModifierOverride[]|null
     */
    public function getModifierOverrides()
    {
        return $this->modifierOverrides;
    }

    /**
     * Sets Modifier Overrides.
     *
     * A set of `CatalogModifierOverride` objects that override whether a given `CatalogModifier` is
     * enabled by default.
     *
     * @maps modifier_overrides
     *
     * @param CatalogModifierOverride[]|null $modifierOverrides
     */
    public function setModifierOverrides(array $modifierOverrides = null)
    {
        $this->modifierOverrides = $modifierOverrides;
    }

    /**
     * Returns Min Selected Modifiers.
     *
     * If 0 or larger, the smallest number of `CatalogModifier`s that must be selected from this
     * `CatalogModifierList`.
     */
    public function getMinSelectedModifiers()
    {
        return $this->minSelectedModifiers;
    }

    /**
     * Sets Min Selected Modifiers.
     *
     * If 0 or larger, the smallest number of `CatalogModifier`s that must be selected from this
     * `CatalogModifierList`.
     *
     * @maps min_selected_modifiers
     */
    public function setMinSelectedModifiers($minSelectedModifiers = null)
    {
        $this->minSelectedModifiers = $minSelectedModifiers;
    }

    /**
     * Returns Max Selected Modifiers.
     *
     * If 0 or larger, the largest number of `CatalogModifier`s that can be selected from this
     * `CatalogModifierList`.
     */
    public function getMaxSelectedModifiers()
    {
        return $this->maxSelectedModifiers;
    }

    /**
     * Sets Max Selected Modifiers.
     *
     * If 0 or larger, the largest number of `CatalogModifier`s that can be selected from this
     * `CatalogModifierList`.
     *
     * @maps max_selected_modifiers
     */
    public function setMaxSelectedModifiers($maxSelectedModifiers = null)
    {
        $this->maxSelectedModifiers = $maxSelectedModifiers;
    }

    /**
     * Returns Enabled.
     *
     * If `true`, enable this `CatalogModifierList`. The default value is `true`.
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Sets Enabled.
     *
     * If `true`, enable this `CatalogModifierList`. The default value is `true`.
     *
     * @maps enabled
     */
    public function setEnabled($enabled = null)
    {
        $this->enabled = $enabled;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['modifier_list_id']           = $this->modifierListId;
        if (isset($this->modifierOverrides)) {
            $json['modifier_overrides']     = $this->modifierOverrides;
        }
        if (isset($this->minSelectedModifiers)) {
            $json['min_selected_modifiers'] = $this->minSelectedModifiers;
        }
        if (isset($this->maxSelectedModifiers)) {
            $json['max_selected_modifiers'] = $this->maxSelectedModifiers;
        }
        if (isset($this->enabled)) {
            $json['enabled']                = $this->enabled;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
