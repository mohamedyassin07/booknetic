<?php



namespace Square\Models;

/**
 * V1PaymentItemDetail
 */
class V1PaymentItemDetail implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $categoryName;

    /**
     * @var string|null
     */
    private $sku;

    /**
     * @var string|null
     */
    private $itemId;

    /**
     * @var string|null
     */
    private $itemVariationId;

    /**
     * Returns Category Name.
     *
     * The name of the item's merchant-defined category, if any.
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Sets Category Name.
     *
     * The name of the item's merchant-defined category, if any.
     *
     * @maps category_name
     */
    public function setCategoryName($categoryName = null)
    {
        $this->categoryName = $categoryName;
    }

    /**
     * Returns Sku.
     *
     * The item's merchant-defined SKU, if any.
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Sets Sku.
     *
     * The item's merchant-defined SKU, if any.
     *
     * @maps sku
     */
    public function setSku($sku = null)
    {
        $this->sku = $sku;
    }

    /**
     * Returns Item Id.
     *
     * The unique ID of the item purchased, if any.
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Sets Item Id.
     *
     * The unique ID of the item purchased, if any.
     *
     * @maps item_id
     */
    public function setItemId($itemId = null)
    {
        $this->itemId = $itemId;
    }

    /**
     * Returns Item Variation Id.
     *
     * The unique ID of the item variation purchased, if any.
     */
    public function getItemVariationId()
    {
        return $this->itemVariationId;
    }

    /**
     * Sets Item Variation Id.
     *
     * The unique ID of the item variation purchased, if any.
     *
     * @maps item_variation_id
     */
    public function setItemVariationId($itemVariationId = null)
    {
        $this->itemVariationId = $itemVariationId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->categoryName)) {
            $json['category_name']     = $this->categoryName;
        }
        if (isset($this->sku)) {
            $json['sku']               = $this->sku;
        }
        if (isset($this->itemId)) {
            $json['item_id']           = $this->itemId;
        }
        if (isset($this->itemVariationId)) {
            $json['item_variation_id'] = $this->itemVariationId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
