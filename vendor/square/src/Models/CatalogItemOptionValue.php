<?php



namespace Square\Models;

/**
 * An enumerated value that can link a
 * `CatalogItemVariation` to an item option as one of
 * its item option values.
 */
class CatalogItemOptionValue implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $itemOptionId;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $color;

    /**
     * @var int|null
     */
    private $ordinal;

    /**
     * Returns Item Option Id.
     *
     * Unique ID of the associated item option.
     */
    public function getItemOptionId()
    {
        return $this->itemOptionId;
    }

    /**
     * Sets Item Option Id.
     *
     * Unique ID of the associated item option.
     *
     * @maps item_option_id
     */
    public function setItemOptionId($itemOptionId = null)
    {
        $this->itemOptionId = $itemOptionId;
    }

    /**
     * Returns Name.
     *
     * Name of this item option value. This is a searchable attribute for use in applicable query filters.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * Name of this item option value. This is a searchable attribute for use in applicable query filters.
     *
     * @maps name
     */
    public function setName($name = null)
    {
        $this->name = $name;
    }

    /**
     * Returns Description.
     *
     * A human-readable description for the option value. This is a searchable attribute for use in
     * applicable query filters.
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * A human-readable description for the option value. This is a searchable attribute for use in
     * applicable query filters.
     *
     * @maps description
     */
    public function setDescription($description = null)
    {
        $this->description = $description;
    }

    /**
     * Returns Color.
     *
     * The HTML-supported hex color for the item option (e.g., "#ff8d4e85").
     * Only displayed if `show_colors` is enabled on the parent `ItemOption`. When
     * left unset, `color` defaults to white ("#ffffff") when `show_colors` is
     * enabled on the parent `ItemOption`.
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Sets Color.
     *
     * The HTML-supported hex color for the item option (e.g., "#ff8d4e85").
     * Only displayed if `show_colors` is enabled on the parent `ItemOption`. When
     * left unset, `color` defaults to white ("#ffffff") when `show_colors` is
     * enabled on the parent `ItemOption`.
     *
     * @maps color
     */
    public function setColor($color = null)
    {
        $this->color = $color;
    }

    /**
     * Returns Ordinal.
     *
     * Determines where this option value appears in a list of option values.
     */
    public function getOrdinal()
    {
        return $this->ordinal;
    }

    /**
     * Sets Ordinal.
     *
     * Determines where this option value appears in a list of option values.
     *
     * @maps ordinal
     */
    public function setOrdinal($ordinal = null)
    {
        $this->ordinal = $ordinal;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->itemOptionId)) {
            $json['item_option_id'] = $this->itemOptionId;
        }
        if (isset($this->name)) {
            $json['name']           = $this->name;
        }
        if (isset($this->description)) {
            $json['description']    = $this->description;
        }
        if (isset($this->color)) {
            $json['color']          = $this->color;
        }
        if (isset($this->ordinal)) {
            $json['ordinal']        = $this->ordinal;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
