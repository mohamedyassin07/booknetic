<?php



namespace Square\Models;

/**
 * Represents a tax being returned that applies to one or more return line items in an order.
 *
 * Fixed-amount, order-scoped taxes are distributed across all non-zero return line item totals.
 * The amount distributed to each return line item is relative to that item’s contribution to the
 * order subtotal.
 */
class OrderReturnTax implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $sourceTaxUid;

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
    private $name;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $percentage;

    /**
     * @var Money|null
     */
    private $appliedMoney;

    /**
     * @var string|null
     */
    private $scope;

    /**
     * Returns Uid.
     *
     * A unique ID that identifies the returned tax only within this order.
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * A unique ID that identifies the returned tax only within this order.
     *
     * @maps uid
     */
    public function setUid($uid = null)
    {
        $this->uid = $uid;
    }

    /**
     * Returns Source Tax Uid.
     *
     * The tax `uid` from the order that contains the original tax charge.
     */
    public function getSourceTaxUid()
    {
        return $this->sourceTaxUid;
    }

    /**
     * Sets Source Tax Uid.
     *
     * The tax `uid` from the order that contains the original tax charge.
     *
     * @maps source_tax_uid
     */
    public function setSourceTaxUid($sourceTaxUid = null)
    {
        $this->sourceTaxUid = $sourceTaxUid;
    }

    /**
     * Returns Catalog Object Id.
     *
     * The catalog object ID referencing [CatalogTax]($m/CatalogTax).
     */
    public function getCatalogObjectId()
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The catalog object ID referencing [CatalogTax]($m/CatalogTax).
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
     * The version of the catalog object that this tax references.
     */
    public function getCatalogVersion()
    {
        return $this->catalogVersion;
    }

    /**
     * Sets Catalog Version.
     *
     * The version of the catalog object that this tax references.
     *
     * @maps catalog_version
     */
    public function setCatalogVersion($catalogVersion = null)
    {
        $this->catalogVersion = $catalogVersion;
    }

    /**
     * Returns Name.
     *
     * The tax's name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The tax's name.
     *
     * @maps name
     */
    public function setName($name = null)
    {
        $this->name = $name;
    }

    /**
     * Returns Type.
     *
     * Indicates how the tax is applied to the associated line item or order.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Indicates how the tax is applied to the associated line item or order.
     *
     * @maps type
     */
    public function setType($type = null)
    {
        $this->type = $type;
    }

    /**
     * Returns Percentage.
     *
     * The percentage of the tax, as a string representation of a decimal number.
     * For example, a value of `"7.25"` corresponds to a percentage of 7.25%.
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Sets Percentage.
     *
     * The percentage of the tax, as a string representation of a decimal number.
     * For example, a value of `"7.25"` corresponds to a percentage of 7.25%.
     *
     * @maps percentage
     */
    public function setPercentage($percentage = null)
    {
        $this->percentage = $percentage;
    }

    /**
     * Returns Applied Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAppliedMoney()
    {
        return $this->appliedMoney;
    }

    /**
     * Sets Applied Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps applied_money
     */
    public function setAppliedMoney(Money $appliedMoney = null)
    {
        $this->appliedMoney = $appliedMoney;
    }

    /**
     * Returns Scope.
     *
     * Indicates whether this is a line-item or order-level tax.
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Sets Scope.
     *
     * Indicates whether this is a line-item or order-level tax.
     *
     * @maps scope
     */
    public function setScope($scope = null)
    {
        $this->scope = $scope;
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
            $json['uid']               = $this->uid;
        }
        if (isset($this->sourceTaxUid)) {
            $json['source_tax_uid']    = $this->sourceTaxUid;
        }
        if (isset($this->catalogObjectId)) {
            $json['catalog_object_id'] = $this->catalogObjectId;
        }
        if (isset($this->catalogVersion)) {
            $json['catalog_version']   = $this->catalogVersion;
        }
        if (isset($this->name)) {
            $json['name']              = $this->name;
        }
        if (isset($this->type)) {
            $json['type']              = $this->type;
        }
        if (isset($this->percentage)) {
            $json['percentage']        = $this->percentage;
        }
        if (isset($this->appliedMoney)) {
            $json['applied_money']     = $this->appliedMoney;
        }
        if (isset($this->scope)) {
            $json['scope']             = $this->scope;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
