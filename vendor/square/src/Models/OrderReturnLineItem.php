<?php



namespace Square\Models;

/**
 * The line item being returned in an order.
 */
class OrderReturnLineItem implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $sourceLineItemUid;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string
     */
    private $quantity;

    /**
     * @var OrderQuantityUnit|null
     */
    private $quantityUnit;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var string|null
     */
    private $catalogObjectId;

    /**
     * @var int|null
     */
    private $catalogVersion;

    /**
     * @var string|null
     */
    private $variationName;

    /**
     * @var string|null
     */
    private $itemType;

    /**
     * @var OrderReturnLineItemModifier[]|null
     */
    private $returnModifiers;

    /**
     * @var OrderLineItemAppliedTax[]|null
     */
    private $appliedTaxes;

    /**
     * @var OrderLineItemAppliedDiscount[]|null
     */
    private $appliedDiscounts;

    /**
     * @var Money|null
     */
    private $basePriceMoney;

    /**
     * @var Money|null
     */
    private $variationTotalPriceMoney;

    /**
     * @var Money|null
     */
    private $grossReturnMoney;

    /**
     * @var Money|null
     */
    private $totalTaxMoney;

    /**
     * @var Money|null
     */
    private $totalDiscountMoney;

    /**
     * @var Money|null
     */
    private $totalMoney;

    /**
     * @param $quantity
     */
    public function __construct($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns Uid.
     *
     * A unique ID for this return line-item entry.
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * A unique ID for this return line-item entry.
     *
     * @maps uid
     */
    public function setUid($uid = null)
    {
        $this->uid = $uid;
    }

    /**
     * Returns Source Line Item Uid.
     *
     * The `uid` of the line item in the original sale order.
     */
    public function getSourceLineItemUid()
    {
        return $this->sourceLineItemUid;
    }

    /**
     * Sets Source Line Item Uid.
     *
     * The `uid` of the line item in the original sale order.
     *
     * @maps source_line_item_uid
     */
    public function setSourceLineItemUid($sourceLineItemUid = null)
    {
        $this->sourceLineItemUid = $sourceLineItemUid;
    }

    /**
     * Returns Name.
     *
     * The name of the line item.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the line item.
     *
     * @maps name
     */
    public function setName($name = null)
    {
        $this->name = $name;
    }

    /**
     * Returns Quantity.
     *
     * The quantity returned, formatted as a decimal number.
     * For example, `"3"`.
     *
     * Line items with a `quantity_unit` can have non-integer quantities.
     * For example, `"1.70000"`.
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets Quantity.
     *
     * The quantity returned, formatted as a decimal number.
     * For example, `"3"`.
     *
     * Line items with a `quantity_unit` can have non-integer quantities.
     * For example, `"1.70000"`.
     *
     * @required
     * @maps quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns Quantity Unit.
     *
     * Contains the measurement unit for a quantity and a precision that
     * specifies the number of digits after the decimal point for decimal quantities.
     */
    public function getQuantityUnit()
    {
        return $this->quantityUnit;
    }

    /**
     * Sets Quantity Unit.
     *
     * Contains the measurement unit for a quantity and a precision that
     * specifies the number of digits after the decimal point for decimal quantities.
     *
     * @maps quantity_unit
     */
    public function setQuantityUnit(OrderQuantityUnit $quantityUnit = null)
    {
        $this->quantityUnit = $quantityUnit;
    }

    /**
     * Returns Note.
     *
     * The note of the return line item.
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * The note of the return line item.
     *
     * @maps note
     */
    public function setNote($note = null)
    {
        $this->note = $note;
    }

    /**
     * Returns Catalog Object Id.
     *
     * The [CatalogItemVariation]($m/CatalogItemVariation) ID applied to this return line item.
     */
    public function getCatalogObjectId()
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The [CatalogItemVariation]($m/CatalogItemVariation) ID applied to this return line item.
     *
     * @maps catalog_object_id
     */
    public function setCatalogObjectId($catalogObjectId = null)
    {
        $this->catalogObjectId = $catalogObjectId;
    }

    /**
     * Returns Catalog Version.
     *
     * The version of the catalog object that this line item references.
     */
    public function getCatalogVersion()
    {
        return $this->catalogVersion;
    }

    /**
     * Sets Catalog Version.
     *
     * The version of the catalog object that this line item references.
     *
     * @maps catalog_version
     */
    public function setCatalogVersion($catalogVersion = null)
    {
        $this->catalogVersion = $catalogVersion;
    }

    /**
     * Returns Variation Name.
     *
     * The name of the variation applied to this return line item.
     */
    public function getVariationName()
    {
        return $this->variationName;
    }

    /**
     * Sets Variation Name.
     *
     * The name of the variation applied to this return line item.
     *
     * @maps variation_name
     */
    public function setVariationName($variationName = null)
    {
        $this->variationName = $variationName;
    }

    /**
     * Returns Item Type.
     *
     * Represents the line item type.
     */
    public function getItemType()
    {
        return $this->itemType;
    }

    /**
     * Sets Item Type.
     *
     * Represents the line item type.
     *
     * @maps item_type
     */
    public function setItemType($itemType = null)
    {
        $this->itemType = $itemType;
    }

    /**
     * Returns Return Modifiers.
     *
     * The [CatalogModifier]($m/CatalogModifier)s applied to this line item.
     *
     * @return OrderReturnLineItemModifier[]|null
     */
    public function getReturnModifiers()
    {
        return $this->returnModifiers;
    }

    /**
     * Sets Return Modifiers.
     *
     * The [CatalogModifier]($m/CatalogModifier)s applied to this line item.
     *
     * @maps return_modifiers
     *
     * @param OrderReturnLineItemModifier[]|null $returnModifiers
     */
    public function setReturnModifiers(array $returnModifiers = null)
    {
        $this->returnModifiers = $returnModifiers;
    }

    /**
     * Returns Applied Taxes.
     *
     * The list of references to `OrderReturnTax` entities applied to the return line item. Each
     * `OrderLineItemAppliedTax` has a `tax_uid` that references the `uid` of a top-level
     * `OrderReturnTax` applied to the return line item. On reads, the applied amount
     * is populated.
     *
     * @return OrderLineItemAppliedTax[]|null
     */
    public function getAppliedTaxes()
    {
        return $this->appliedTaxes;
    }

    /**
     * Sets Applied Taxes.
     *
     * The list of references to `OrderReturnTax` entities applied to the return line item. Each
     * `OrderLineItemAppliedTax` has a `tax_uid` that references the `uid` of a top-level
     * `OrderReturnTax` applied to the return line item. On reads, the applied amount
     * is populated.
     *
     * @maps applied_taxes
     *
     * @param OrderLineItemAppliedTax[]|null $appliedTaxes
     */
    public function setAppliedTaxes(array $appliedTaxes = null)
    {
        $this->appliedTaxes = $appliedTaxes;
    }

    /**
     * Returns Applied Discounts.
     *
     * The list of references to `OrderReturnDiscount` entities applied to the return line item. Each
     * `OrderLineItemAppliedDiscount` has a `discount_uid` that references the `uid` of a top-level
     * `OrderReturnDiscount` applied to the return line item. On reads, the applied amount
     * is populated.
     *
     * @return OrderLineItemAppliedDiscount[]|null
     */
    public function getAppliedDiscounts()
    {
        return $this->appliedDiscounts;
    }

    /**
     * Sets Applied Discounts.
     *
     * The list of references to `OrderReturnDiscount` entities applied to the return line item. Each
     * `OrderLineItemAppliedDiscount` has a `discount_uid` that references the `uid` of a top-level
     * `OrderReturnDiscount` applied to the return line item. On reads, the applied amount
     * is populated.
     *
     * @maps applied_discounts
     *
     * @param OrderLineItemAppliedDiscount[]|null $appliedDiscounts
     */
    public function setAppliedDiscounts(array $appliedDiscounts = null)
    {
        $this->appliedDiscounts = $appliedDiscounts;
    }

    /**
     * Returns Base Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getBasePriceMoney()
    {
        return $this->basePriceMoney;
    }

    /**
     * Sets Base Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps base_price_money
     */
    public function setBasePriceMoney(Money $basePriceMoney = null)
    {
        $this->basePriceMoney = $basePriceMoney;
    }

    /**
     * Returns Variation Total Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getVariationTotalPriceMoney()
    {
        return $this->variationTotalPriceMoney;
    }

    /**
     * Sets Variation Total Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps variation_total_price_money
     */
    public function setVariationTotalPriceMoney(Money $variationTotalPriceMoney = null)
    {
        $this->variationTotalPriceMoney = $variationTotalPriceMoney;
    }

    /**
     * Returns Gross Return Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getGrossReturnMoney()
    {
        return $this->grossReturnMoney;
    }

    /**
     * Sets Gross Return Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps gross_return_money
     */
    public function setGrossReturnMoney(Money $grossReturnMoney = null)
    {
        $this->grossReturnMoney = $grossReturnMoney;
    }

    /**
     * Returns Total Tax Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalTaxMoney()
    {
        return $this->totalTaxMoney;
    }

    /**
     * Sets Total Tax Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_tax_money
     */
    public function setTotalTaxMoney(Money $totalTaxMoney = null)
    {
        $this->totalTaxMoney = $totalTaxMoney;
    }

    /**
     * Returns Total Discount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalDiscountMoney()
    {
        return $this->totalDiscountMoney;
    }

    /**
     * Sets Total Discount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_discount_money
     */
    public function setTotalDiscountMoney(Money $totalDiscountMoney = null)
    {
        $this->totalDiscountMoney = $totalDiscountMoney;
    }

    /**
     * Returns Total Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalMoney()
    {
        return $this->totalMoney;
    }

    /**
     * Sets Total Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_money
     */
    public function setTotalMoney(Money $totalMoney = null)
    {
        $this->totalMoney = $totalMoney;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->uid)) {
            $json['uid']                         = $this->uid;
        }
        if (isset($this->sourceLineItemUid)) {
            $json['source_line_item_uid']        = $this->sourceLineItemUid;
        }
        if (isset($this->name)) {
            $json['name']                        = $this->name;
        }
        $json['quantity']                        = $this->quantity;
        if (isset($this->quantityUnit)) {
            $json['quantity_unit']               = $this->quantityUnit;
        }
        if (isset($this->note)) {
            $json['note']                        = $this->note;
        }
        if (isset($this->catalogObjectId)) {
            $json['catalog_object_id']           = $this->catalogObjectId;
        }
        if (isset($this->catalogVersion)) {
            $json['catalog_version']             = $this->catalogVersion;
        }
        if (isset($this->variationName)) {
            $json['variation_name']              = $this->variationName;
        }
        if (isset($this->itemType)) {
            $json['item_type']                   = $this->itemType;
        }
        if (isset($this->returnModifiers)) {
            $json['return_modifiers']            = $this->returnModifiers;
        }
        if (isset($this->appliedTaxes)) {
            $json['applied_taxes']               = $this->appliedTaxes;
        }
        if (isset($this->appliedDiscounts)) {
            $json['applied_discounts']           = $this->appliedDiscounts;
        }
        if (isset($this->basePriceMoney)) {
            $json['base_price_money']            = $this->basePriceMoney;
        }
        if (isset($this->variationTotalPriceMoney)) {
            $json['variation_total_price_money'] = $this->variationTotalPriceMoney;
        }
        if (isset($this->grossReturnMoney)) {
            $json['gross_return_money']          = $this->grossReturnMoney;
        }
        if (isset($this->totalTaxMoney)) {
            $json['total_tax_money']             = $this->totalTaxMoney;
        }
        if (isset($this->totalDiscountMoney)) {
            $json['total_discount_money']        = $this->totalDiscountMoney;
        }
        if (isset($this->totalMoney)) {
            $json['total_money']                 = $this->totalMoney;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
