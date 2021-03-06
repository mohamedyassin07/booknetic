<?php



namespace Square\Models;

/**
 * A line item modifier being returned.
 */
class OrderReturnLineItemModifier implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string|null
     */
    private $sourceModifierUid;

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
     * @var Money|null
     */
    private $basePriceMoney;

    /**
     * @var Money|null
     */
    private $totalPriceMoney;

    /**
     * Returns Uid.
     *
     * A unique ID that identifies the return modifier only within this order.
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * A unique ID that identifies the return modifier only within this order.
     *
     * @maps uid
     */
    public function setUid($uid = null)
    {
        $this->uid = $uid;
    }

    /**
     * Returns Source Modifier Uid.
     *
     * The modifier `uid` from the order's line item that contains the
     * original sale of this line item modifier.
     */
    public function getSourceModifierUid()
    {
        return $this->sourceModifierUid;
    }

    /**
     * Sets Source Modifier Uid.
     *
     * The modifier `uid` from the order's line item that contains the
     * original sale of this line item modifier.
     *
     * @maps source_modifier_uid
     */
    public function setSourceModifierUid($sourceModifierUid = null)
    {
        $this->sourceModifierUid = $sourceModifierUid;
    }

    /**
     * Returns Catalog Object Id.
     *
     * The catalog object ID referencing [CatalogModifier]($m/CatalogModifier).
     */
    public function getCatalogObjectId()
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The catalog object ID referencing [CatalogModifier]($m/CatalogModifier).
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
     * The version of the catalog object that this line item modifier references.
     */
    public function getCatalogVersion()
    {
        return $this->catalogVersion;
    }

    /**
     * Sets Catalog Version.
     *
     * The version of the catalog object that this line item modifier references.
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
     * The name of the item modifier.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the item modifier.
     *
     * @maps name
     */
    public function setName($name = null)
    {
        $this->name = $name;
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
     * Returns Total Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalPriceMoney()
    {
        return $this->totalPriceMoney;
    }

    /**
     * Sets Total Price Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_price_money
     */
    public function setTotalPriceMoney(Money $totalPriceMoney = null)
    {
        $this->totalPriceMoney = $totalPriceMoney;
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
            $json['uid']                 = $this->uid;
        }
        if (isset($this->sourceModifierUid)) {
            $json['source_modifier_uid'] = $this->sourceModifierUid;
        }
        if (isset($this->catalogObjectId)) {
            $json['catalog_object_id']   = $this->catalogObjectId;
        }
        if (isset($this->catalogVersion)) {
            $json['catalog_version']     = $this->catalogVersion;
        }
        if (isset($this->name)) {
            $json['name']                = $this->name;
        }
        if (isset($this->basePriceMoney)) {
            $json['base_price_money']    = $this->basePriceMoney;
        }
        if (isset($this->totalPriceMoney)) {
            $json['total_price_money']   = $this->totalPriceMoney;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
