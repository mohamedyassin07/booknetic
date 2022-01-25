<?php



namespace Square\Models;

/**
 * Represents the rule of conversion between a stockable
 * [CatalogItemVariation]($m/CatalogItemVariation)
 * and a non-stockable sell-by or receive-by `CatalogItemVariation` that
 * share the same underlying stock.
 */
class CatalogStockConversion implements \JsonSerializable
{
    /**
     * @var string
     */
    private $stockableItemVariationId;

    /**
     * @var string
     */
    private $stockableQuantity;

    /**
     * @var string
     */
    private $nonstockableQuantity;

    /**
     * @param $stockableItemVariationId
     * @param $stockableQuantity
     * @param $nonstockableQuantity
     */
    public function __construct(
        $stockableItemVariationId,
        $stockableQuantity,
        $nonstockableQuantity
    ) {
        $this->stockableItemVariationId = $stockableItemVariationId;
        $this->stockableQuantity = $stockableQuantity;
        $this->nonstockableQuantity = $nonstockableQuantity;
    }

    /**
     * Returns Stockable Item Variation Id.
     *
     * References to the stockable [CatalogItemVariation]($m/CatalogItemVariation)
     * for this stock conversion. Selling, receiving or recounting the non-stockable `CatalogItemVariation`
     * defined with a stock conversion results in adjustments of this stockable `CatalogItemVariation`.
     * This immutable field must reference a stockable `CatalogItemVariation`
     * that shares the parent [CatalogItem]($m/CatalogItem) of the converted `CatalogItemVariation.`
     */
    public function getStockableItemVariationId()
    {
        return $this->stockableItemVariationId;
    }

    /**
     * Sets Stockable Item Variation Id.
     *
     * References to the stockable [CatalogItemVariation]($m/CatalogItemVariation)
     * for this stock conversion. Selling, receiving or recounting the non-stockable `CatalogItemVariation`
     * defined with a stock conversion results in adjustments of this stockable `CatalogItemVariation`.
     * This immutable field must reference a stockable `CatalogItemVariation`
     * that shares the parent [CatalogItem]($m/CatalogItem) of the converted `CatalogItemVariation.`
     *
     * @required
     * @maps stockable_item_variation_id
     */
    public function setStockableItemVariationId($stockableItemVariationId)
    {
        $this->stockableItemVariationId = $stockableItemVariationId;
    }

    /**
     * Returns Stockable Quantity.
     *
     * The quantity of the stockable item variation (as identified by `stockable_item_variation_id`)
     * equivalent to the non-stockable item variation quantity (as specified in `nonstockable_quantity`)
     * as defined by this stock conversion.  It accepts a decimal number in a string format that can take
     * up to 10 digits before the decimal point and up to 5 digits after the decimal point.
     */
    public function getStockableQuantity()
    {
        return $this->stockableQuantity;
    }

    /**
     * Sets Stockable Quantity.
     *
     * The quantity of the stockable item variation (as identified by `stockable_item_variation_id`)
     * equivalent to the non-stockable item variation quantity (as specified in `nonstockable_quantity`)
     * as defined by this stock conversion.  It accepts a decimal number in a string format that can take
     * up to 10 digits before the decimal point and up to 5 digits after the decimal point.
     *
     * @required
     * @maps stockable_quantity
     */
    public function setStockableQuantity($stockableQuantity)
    {
        $this->stockableQuantity = $stockableQuantity;
    }

    /**
     * Returns Nonstockable Quantity.
     *
     * The converted equivalent quantity of the non-stockable
     * [CatalogItemVariation]($m/CatalogItemVariation)
     * in its measurement unit. The `stockable_quantity` value and this `nonstockable_quantity` value
     * together
     * define the conversion ratio between stockable item variation and the non-stockable item variation.
     * It accepts a decimal number in a string format that can take up to 10 digits before the decimal
     * point
     * and up to 5 digits after the decimal point.
     */
    public function getNonstockableQuantity()
    {
        return $this->nonstockableQuantity;
    }

    /**
     * Sets Nonstockable Quantity.
     *
     * The converted equivalent quantity of the non-stockable
     * [CatalogItemVariation]($m/CatalogItemVariation)
     * in its measurement unit. The `stockable_quantity` value and this `nonstockable_quantity` value
     * together
     * define the conversion ratio between stockable item variation and the non-stockable item variation.
     * It accepts a decimal number in a string format that can take up to 10 digits before the decimal
     * point
     * and up to 5 digits after the decimal point.
     *
     * @required
     * @maps nonstockable_quantity
     */
    public function setNonstockableQuantity($nonstockableQuantity)
    {
        $this->nonstockableQuantity = $nonstockableQuantity;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['stockable_item_variation_id'] = $this->stockableItemVariationId;
        $json['stockable_quantity']          = $this->stockableQuantity;
        $json['nonstockable_quantity']       = $this->nonstockableQuantity;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
