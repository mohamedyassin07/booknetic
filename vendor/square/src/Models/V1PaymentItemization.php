<?php



namespace Square\Models;

/**
 * Payment include an` itemizations` field that lists the items purchased,
 * along with associated fees, modifiers, and discounts. Each itemization has an
 * `itemization_type` field that indicates which of the following the itemization
 * represents:
 *
 * <ul>
 * <li>An item variation from the merchant's item library</li>
 * <li>A custom monetary amount</li>
 * <li>
 * An action performed on a Square gift card, such as activating or
 * reloading it.
 * </li>
 * </ul>
 *
 * *Note**: itemization information included in a `Payment` object reflects
 * details collected **at the time of the payment**. Details such as the name or
 * price of items might have changed since the payment was processed.
 */
class V1PaymentItemization implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var float|null
     */
    private $quantity;

    /**
     * @var string|null
     */
    private $itemizationType;

    /**
     * @var V1PaymentItemDetail|null
     */
    private $itemDetail;

    /**
     * @var string|null
     */
    private $notes;

    /**
     * @var string|null
     */
    private $itemVariationName;

    /**
     * @var V1Money|null
     */
    private $totalMoney;

    /**
     * @var V1Money|null
     */
    private $singleQuantityMoney;

    /**
     * @var V1Money|null
     */
    private $grossSalesMoney;

    /**
     * @var V1Money|null
     */
    private $discountMoney;

    /**
     * @var V1Money|null
     */
    private $netSalesMoney;

    /**
     * @var V1PaymentTax[]|null
     */
    private $taxes;

    /**
     * @var V1PaymentDiscount[]|null
     */
    private $discounts;

    /**
     * @var V1PaymentModifier[]|null
     */
    private $modifiers;

    /**
     * Returns Name.
     *
     * The item's name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The item's name.
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
     * The quantity of the item purchased. This can be a decimal value.
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets Quantity.
     *
     * The quantity of the item purchased. This can be a decimal value.
     *
     * @maps quantity
     */
    public function setQuantity($quantity = null)
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns Itemization Type.
     */
    public function getItemizationType()
    {
        return $this->itemizationType;
    }

    /**
     * Sets Itemization Type.
     *
     * @maps itemization_type
     */
    public function setItemizationType($itemizationType = null)
    {
        $this->itemizationType = $itemizationType;
    }

    /**
     * Returns Item Detail.
     *
     * V1PaymentItemDetail
     */
    public function getItemDetail()
    {
        return $this->itemDetail;
    }

    /**
     * Sets Item Detail.
     *
     * V1PaymentItemDetail
     *
     * @maps item_detail
     */
    public function setItemDetail(V1PaymentItemDetail $itemDetail = null)
    {
        $this->itemDetail = $itemDetail;
    }

    /**
     * Returns Notes.
     *
     * Notes entered by the merchant about the item at the time of payment, if any.
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Sets Notes.
     *
     * Notes entered by the merchant about the item at the time of payment, if any.
     *
     * @maps notes
     */
    public function setNotes($notes = null)
    {
        $this->notes = $notes;
    }

    /**
     * Returns Item Variation Name.
     *
     * The name of the item variation purchased, if any.
     */
    public function getItemVariationName()
    {
        return $this->itemVariationName;
    }

    /**
     * Sets Item Variation Name.
     *
     * The name of the item variation purchased, if any.
     *
     * @maps item_variation_name
     */
    public function setItemVariationName($itemVariationName = null)
    {
        $this->itemVariationName = $itemVariationName;
    }

    /**
     * Returns Total Money.
     */
    public function getTotalMoney()
    {
        return $this->totalMoney;
    }

    /**
     * Sets Total Money.
     *
     * @maps total_money
     */
    public function setTotalMoney(V1Money $totalMoney = null)
    {
        $this->totalMoney = $totalMoney;
    }

    /**
     * Returns Single Quantity Money.
     */
    public function getSingleQuantityMoney()
    {
        return $this->singleQuantityMoney;
    }

    /**
     * Sets Single Quantity Money.
     *
     * @maps single_quantity_money
     */
    public function setSingleQuantityMoney(V1Money $singleQuantityMoney = null)
    {
        $this->singleQuantityMoney = $singleQuantityMoney;
    }

    /**
     * Returns Gross Sales Money.
     */
    public function getGrossSalesMoney()
    {
        return $this->grossSalesMoney;
    }

    /**
     * Sets Gross Sales Money.
     *
     * @maps gross_sales_money
     */
    public function setGrossSalesMoney(V1Money $grossSalesMoney = null)
    {
        $this->grossSalesMoney = $grossSalesMoney;
    }

    /**
     * Returns Discount Money.
     */
    public function getDiscountMoney()
    {
        return $this->discountMoney;
    }

    /**
     * Sets Discount Money.
     *
     * @maps discount_money
     */
    public function setDiscountMoney(V1Money $discountMoney = null)
    {
        $this->discountMoney = $discountMoney;
    }

    /**
     * Returns Net Sales Money.
     */
    public function getNetSalesMoney()
    {
        return $this->netSalesMoney;
    }

    /**
     * Sets Net Sales Money.
     *
     * @maps net_sales_money
     */
    public function setNetSalesMoney(V1Money $netSalesMoney = null)
    {
        $this->netSalesMoney = $netSalesMoney;
    }

    /**
     * Returns Taxes.
     *
     * All taxes applied to this itemization.
     *
     * @return V1PaymentTax[]|null
     */
    public function getTaxes()
    {
        return $this->taxes;
    }

    /**
     * Sets Taxes.
     *
     * All taxes applied to this itemization.
     *
     * @maps taxes
     *
     * @param V1PaymentTax[]|null $taxes
     */
    public function setTaxes(array $taxes = null)
    {
        $this->taxes = $taxes;
    }

    /**
     * Returns Discounts.
     *
     * All discounts applied to this itemization.
     *
     * @return V1PaymentDiscount[]|null
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * Sets Discounts.
     *
     * All discounts applied to this itemization.
     *
     * @maps discounts
     *
     * @param V1PaymentDiscount[]|null $discounts
     */
    public function setDiscounts(array $discounts = null)
    {
        $this->discounts = $discounts;
    }

    /**
     * Returns Modifiers.
     *
     * All modifier options applied to this itemization.
     *
     * @return V1PaymentModifier[]|null
     */
    public function getModifiers()
    {
        return $this->modifiers;
    }

    /**
     * Sets Modifiers.
     *
     * All modifier options applied to this itemization.
     *
     * @maps modifiers
     *
     * @param V1PaymentModifier[]|null $modifiers
     */
    public function setModifiers(array $modifiers = null)
    {
        $this->modifiers = $modifiers;
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
            $json['name']                  = $this->name;
        }
        if (isset($this->quantity)) {
            $json['quantity']              = $this->quantity;
        }
        if (isset($this->itemizationType)) {
            $json['itemization_type']      = $this->itemizationType;
        }
        if (isset($this->itemDetail)) {
            $json['item_detail']           = $this->itemDetail;
        }
        if (isset($this->notes)) {
            $json['notes']                 = $this->notes;
        }
        if (isset($this->itemVariationName)) {
            $json['item_variation_name']   = $this->itemVariationName;
        }
        if (isset($this->totalMoney)) {
            $json['total_money']           = $this->totalMoney;
        }
        if (isset($this->singleQuantityMoney)) {
            $json['single_quantity_money'] = $this->singleQuantityMoney;
        }
        if (isset($this->grossSalesMoney)) {
            $json['gross_sales_money']     = $this->grossSalesMoney;
        }
        if (isset($this->discountMoney)) {
            $json['discount_money']        = $this->discountMoney;
        }
        if (isset($this->netSalesMoney)) {
            $json['net_sales_money']       = $this->netSalesMoney;
        }
        if (isset($this->taxes)) {
            $json['taxes']                 = $this->taxes;
        }
        if (isset($this->discounts)) {
            $json['discounts']             = $this->discounts;
        }
        if (isset($this->modifiers)) {
            $json['modifiers']             = $this->modifiers;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
