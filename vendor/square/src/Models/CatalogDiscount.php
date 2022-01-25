<?php



namespace Square\Models;

/**
 * A discount applicable to items.
 */
class CatalogDiscount implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $discountType;

    /**
     * @var string|null
     */
    private $percentage;

    /**
     * @var Money|null
     */
    private $amountMoney;

    /**
     * @var bool|null
     */
    private $pinRequired;

    /**
     * @var string|null
     */
    private $labelColor;

    /**
     * @var string|null
     */
    private $modifyTaxBasis;

    /**
     * Returns Name.
     *
     * The discount name. This is a searchable attribute for use in applicable query filters, and its value
     * length is of Unicode code points.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The discount name. This is a searchable attribute for use in applicable query filters, and its value
     * length is of Unicode code points.
     *
     * @maps name
     */
    public function setName($name = null)
    {
        $this->name = $name;
    }

    /**
     * Returns Discount Type.
     *
     * How to apply a CatalogDiscount to a CatalogItem.
     */
    public function getDiscountType()
    {
        return $this->discountType;
    }

    /**
     * Sets Discount Type.
     *
     * How to apply a CatalogDiscount to a CatalogItem.
     *
     * @maps discount_type
     */
    public function setDiscountType($discountType = null)
    {
        $this->discountType = $discountType;
    }

    /**
     * Returns Percentage.
     *
     * The percentage of the discount as a string representation of a decimal number, using a `.` as the
     * decimal
     * separator and without a `%` sign. A value of `7.5` corresponds to `7.5%`. Specify a percentage of
     * `0` if `discount_type`
     * is `VARIABLE_PERCENTAGE`.
     *
     * Do not use this field for amount-based or variable discounts.
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Sets Percentage.
     *
     * The percentage of the discount as a string representation of a decimal number, using a `.` as the
     * decimal
     * separator and without a `%` sign. A value of `7.5` corresponds to `7.5%`. Specify a percentage of
     * `0` if `discount_type`
     * is `VARIABLE_PERCENTAGE`.
     *
     * Do not use this field for amount-based or variable discounts.
     *
     * @maps percentage
     */
    public function setPercentage($percentage = null)
    {
        $this->percentage = $percentage;
    }

    /**
     * Returns Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAmountMoney()
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps amount_money
     */
    public function setAmountMoney(Money $amountMoney = null)
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Pin Required.
     *
     * Indicates whether a mobile staff member needs to enter their PIN to apply the
     * discount to a payment in the Square Point of Sale app.
     */
    public function getPinRequired()
    {
        return $this->pinRequired;
    }

    /**
     * Sets Pin Required.
     *
     * Indicates whether a mobile staff member needs to enter their PIN to apply the
     * discount to a payment in the Square Point of Sale app.
     *
     * @maps pin_required
     */
    public function setPinRequired($pinRequired = null)
    {
        $this->pinRequired = $pinRequired;
    }

    /**
     * Returns Label Color.
     *
     * The color of the discount display label in the Square Point of Sale app. This must be a valid hex
     * color code.
     */
    public function getLabelColor()
    {
        return $this->labelColor;
    }

    /**
     * Sets Label Color.
     *
     * The color of the discount display label in the Square Point of Sale app. This must be a valid hex
     * color code.
     *
     * @maps label_color
     */
    public function setLabelColor($labelColor = null)
    {
        $this->labelColor = $labelColor;
    }

    /**
     * Returns Modify Tax Basis.
     */
    public function getModifyTaxBasis()
    {
        return $this->modifyTaxBasis;
    }

    /**
     * Sets Modify Tax Basis.
     *
     * @maps modify_tax_basis
     */
    public function setModifyTaxBasis($modifyTaxBasis = null)
    {
        $this->modifyTaxBasis = $modifyTaxBasis;
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
            $json['name']             = $this->name;
        }
        if (isset($this->discountType)) {
            $json['discount_type']    = $this->discountType;
        }
        if (isset($this->percentage)) {
            $json['percentage']       = $this->percentage;
        }
        if (isset($this->amountMoney)) {
            $json['amount_money']     = $this->amountMoney;
        }
        if (isset($this->pinRequired)) {
            $json['pin_required']     = $this->pinRequired;
        }
        if (isset($this->labelColor)) {
            $json['label_color']      = $this->labelColor;
        }
        if (isset($this->modifyTaxBasis)) {
            $json['modify_tax_basis'] = $this->modifyTaxBasis;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
