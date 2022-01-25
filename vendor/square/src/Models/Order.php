<?php



namespace Square\Models;

/**
 * Contains all information related to a single order to process with Square,
 * including line items that specify the products to purchase. `Order` objects also
 * include information about any associated tenders, refunds, and returns.
 *
 * All Connect V2 Transactions have all been converted to Orders including all associated
 * itemization data.
 */
class Order implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var OrderSource|null
     */
    private $source;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var OrderLineItem[]|null
     */
    private $lineItems;

    /**
     * @var OrderLineItemTax[]|null
     */
    private $taxes;

    /**
     * @var OrderLineItemDiscount[]|null
     */
    private $discounts;

    /**
     * @var OrderServiceCharge[]|null
     */
    private $serviceCharges;

    /**
     * @var OrderFulfillment[]|null
     */
    private $fulfillments;

    /**
     * @var OrderReturn[]|null
     */
    private $returns;

    /**
     * @var OrderMoneyAmounts|null
     */
    private $returnAmounts;

    /**
     * @var OrderMoneyAmounts|null
     */
    private $netAmounts;

    /**
     * @var OrderRoundingAdjustment|null
     */
    private $roundingAdjustment;

    /**
     * @var Tender[]|null
     */
    private $tenders;

    /**
     * @var Refund[]|null
     */
    private $refunds;

    /**
     * @var array|null
     */
    private $metadata;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var string|null
     */
    private $closedAt;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var Money|null
     */
    private $totalMoney;

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
    private $totalTipMoney;

    /**
     * @var Money|null
     */
    private $totalServiceChargeMoney;

    /**
     * @var OrderPricingOptions|null
     */
    private $pricingOptions;

    /**
     * @var OrderReward[]|null
     */
    private $rewards;

    /**
     * @param $locationId
     */
    public function __construct($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Id.
     *
     * The order's unique ID.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The order's unique ID.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the seller location that this order is associated with.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the seller location that this order is associated with.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Reference Id.
     *
     * A client-specified ID to associate an entity in another system
     * with this order.
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * A client-specified ID to associate an entity in another system
     * with this order.
     *
     * @maps reference_id
     */
    public function setReferenceId($referenceId = null)
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Source.
     *
     * Represents the origination details of an order.
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Sets Source.
     *
     * Represents the origination details of an order.
     *
     * @maps source
     */
    public function setSource(OrderSource $source = null)
    {
        $this->source = $source;
    }

    /**
     * Returns Customer Id.
     *
     * The ID of the [customer]($m/Customer) associated with the order.
     *
     * __IMPORTANT:__ You should specify a `customer_id` if you want the corresponding payment
     * transactions
     * to be explicitly linked to the customer in the Seller Dashboard. If this field is omitted, the
     * `customer_id` assigned to any underlying `Payment` objects is ignored and might result in the
     * creation of new [instant profiles](https://developer.squareup.com/docs/customers-api/what-it-
     * does#instant-profiles).
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The ID of the [customer]($m/Customer) associated with the order.
     *
     * __IMPORTANT:__ You should specify a `customer_id` if you want the corresponding payment
     * transactions
     * to be explicitly linked to the customer in the Seller Dashboard. If this field is omitted, the
     * `customer_id` assigned to any underlying `Payment` objects is ignored and might result in the
     * creation of new [instant profiles](https://developer.squareup.com/docs/customers-api/what-it-
     * does#instant-profiles).
     *
     * @maps customer_id
     */
    public function setCustomerId($customerId = null)
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Line Items.
     *
     * The line items included in the order.
     *
     * @return OrderLineItem[]|null
     */
    public function getLineItems()
    {
        return $this->lineItems;
    }

    /**
     * Sets Line Items.
     *
     * The line items included in the order.
     *
     * @maps line_items
     *
     * @param OrderLineItem[]|null $lineItems
     */
    public function setLineItems(array $lineItems = null)
    {
        $this->lineItems = $lineItems;
    }

    /**
     * Returns Taxes.
     *
     * The list of all taxes associated with the order.
     *
     * Taxes can be scoped to either `ORDER` or `LINE_ITEM`. For taxes with `LINE_ITEM` scope, an
     * `OrderLineItemAppliedTax` must be added to each line item that the tax applies to. For taxes
     * with `ORDER` scope, the server generates an `OrderLineItemAppliedTax` for every line item.
     *
     * On reads, each tax in the list includes the total amount of that tax applied to the order.
     *
     * __IMPORTANT__: If `LINE_ITEM` scope is set on any taxes in this field, using the deprecated
     * `line_items.taxes` field results in an error. Use `line_items.applied_taxes`
     * instead.
     *
     * @return OrderLineItemTax[]|null
     */
    public function getTaxes()
    {
        return $this->taxes;
    }

    /**
     * Sets Taxes.
     *
     * The list of all taxes associated with the order.
     *
     * Taxes can be scoped to either `ORDER` or `LINE_ITEM`. For taxes with `LINE_ITEM` scope, an
     * `OrderLineItemAppliedTax` must be added to each line item that the tax applies to. For taxes
     * with `ORDER` scope, the server generates an `OrderLineItemAppliedTax` for every line item.
     *
     * On reads, each tax in the list includes the total amount of that tax applied to the order.
     *
     * __IMPORTANT__: If `LINE_ITEM` scope is set on any taxes in this field, using the deprecated
     * `line_items.taxes` field results in an error. Use `line_items.applied_taxes`
     * instead.
     *
     * @maps taxes
     *
     * @param OrderLineItemTax[]|null $taxes
     */
    public function setTaxes(array $taxes = null)
    {
        $this->taxes = $taxes;
    }

    /**
     * Returns Discounts.
     *
     * The list of all discounts associated with the order.
     *
     * Discounts can be scoped to either `ORDER` or `LINE_ITEM`. For discounts scoped to `LINE_ITEM`,
     * an `OrderLineItemAppliedDiscount` must be added to each line item that the discount applies to.
     * For discounts with `ORDER` scope, the server generates an `OrderLineItemAppliedDiscount`
     * for every line item.
     *
     * __IMPORTANT__: If `LINE_ITEM` scope is set on any discounts in this field, using the deprecated
     * `line_items.discounts` field results in an error. Use `line_items.applied_discounts`
     * instead.
     *
     * @return OrderLineItemDiscount[]|null
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * Sets Discounts.
     *
     * The list of all discounts associated with the order.
     *
     * Discounts can be scoped to either `ORDER` or `LINE_ITEM`. For discounts scoped to `LINE_ITEM`,
     * an `OrderLineItemAppliedDiscount` must be added to each line item that the discount applies to.
     * For discounts with `ORDER` scope, the server generates an `OrderLineItemAppliedDiscount`
     * for every line item.
     *
     * __IMPORTANT__: If `LINE_ITEM` scope is set on any discounts in this field, using the deprecated
     * `line_items.discounts` field results in an error. Use `line_items.applied_discounts`
     * instead.
     *
     * @maps discounts
     *
     * @param OrderLineItemDiscount[]|null $discounts
     */
    public function setDiscounts(array $discounts = null)
    {
        $this->discounts = $discounts;
    }

    /**
     * Returns Service Charges.
     *
     * A list of service charges applied to the order.
     *
     * @return OrderServiceCharge[]|null
     */
    public function getServiceCharges()
    {
        return $this->serviceCharges;
    }

    /**
     * Sets Service Charges.
     *
     * A list of service charges applied to the order.
     *
     * @maps service_charges
     *
     * @param OrderServiceCharge[]|null $serviceCharges
     */
    public function setServiceCharges(array $serviceCharges = null)
    {
        $this->serviceCharges = $serviceCharges;
    }

    /**
     * Returns Fulfillments.
     *
     * Details about order fulfillment.
     *
     * Orders can only be created with at most one fulfillment. However, orders returned
     * by the API might contain multiple fulfillments.
     *
     * @return OrderFulfillment[]|null
     */
    public function getFulfillments()
    {
        return $this->fulfillments;
    }

    /**
     * Sets Fulfillments.
     *
     * Details about order fulfillment.
     *
     * Orders can only be created with at most one fulfillment. However, orders returned
     * by the API might contain multiple fulfillments.
     *
     * @maps fulfillments
     *
     * @param OrderFulfillment[]|null $fulfillments
     */
    public function setFulfillments(array $fulfillments = null)
    {
        $this->fulfillments = $fulfillments;
    }

    /**
     * Returns Returns.
     *
     * A collection of items from sale orders being returned in this one. Normally part of an
     * itemized return or exchange. There is exactly one `Return` object per sale `Order` being
     * referenced.
     *
     * @return OrderReturn[]|null
     */
    public function getReturns()
    {
        return $this->returns;
    }

    /**
     * Sets Returns.
     *
     * A collection of items from sale orders being returned in this one. Normally part of an
     * itemized return or exchange. There is exactly one `Return` object per sale `Order` being
     * referenced.
     *
     * @maps returns
     *
     * @param OrderReturn[]|null $returns
     */
    public function setReturns(array $returns = null)
    {
        $this->returns = $returns;
    }

    /**
     * Returns Return Amounts.
     *
     * A collection of various money amounts.
     */
    public function getReturnAmounts()
    {
        return $this->returnAmounts;
    }

    /**
     * Sets Return Amounts.
     *
     * A collection of various money amounts.
     *
     * @maps return_amounts
     */
    public function setReturnAmounts(OrderMoneyAmounts $returnAmounts = null)
    {
        $this->returnAmounts = $returnAmounts;
    }

    /**
     * Returns Net Amounts.
     *
     * A collection of various money amounts.
     */
    public function getNetAmounts()
    {
        return $this->netAmounts;
    }

    /**
     * Sets Net Amounts.
     *
     * A collection of various money amounts.
     *
     * @maps net_amounts
     */
    public function setNetAmounts(OrderMoneyAmounts $netAmounts = null)
    {
        $this->netAmounts = $netAmounts;
    }

    /**
     * Returns Rounding Adjustment.
     *
     * A rounding adjustment of the money being returned. Commonly used to apply cash rounding
     * when the minimum unit of the account is smaller than the lowest physical denomination of the
     * currency.
     */
    public function getRoundingAdjustment()
    {
        return $this->roundingAdjustment;
    }

    /**
     * Sets Rounding Adjustment.
     *
     * A rounding adjustment of the money being returned. Commonly used to apply cash rounding
     * when the minimum unit of the account is smaller than the lowest physical denomination of the
     * currency.
     *
     * @maps rounding_adjustment
     */
    public function setRoundingAdjustment(OrderRoundingAdjustment $roundingAdjustment = null)
    {
        $this->roundingAdjustment = $roundingAdjustment;
    }

    /**
     * Returns Tenders.
     *
     * The tenders that were used to pay for the order.
     *
     * @return Tender[]|null
     */
    public function getTenders()
    {
        return $this->tenders;
    }

    /**
     * Sets Tenders.
     *
     * The tenders that were used to pay for the order.
     *
     * @maps tenders
     *
     * @param Tender[]|null $tenders
     */
    public function setTenders(array $tenders = null)
    {
        $this->tenders = $tenders;
    }

    /**
     * Returns Refunds.
     *
     * The refunds that are part of this order.
     *
     * @return Refund[]|null
     */
    public function getRefunds()
    {
        return $this->refunds;
    }

    /**
     * Sets Refunds.
     *
     * The refunds that are part of this order.
     *
     * @maps refunds
     *
     * @param Refund[]|null $refunds
     */
    public function setRefunds(array $refunds = null)
    {
        $this->refunds = $refunds;
    }

    /**
     * Returns Metadata.
     *
     * Application-defined data attached to this order. Metadata fields are intended
     * to store descriptive references or associations with an entity in another system or store brief
     * information about the object. Square does not process this field; it only stores and returns it
     * in relevant API calls. Do not use metadata to store any sensitive information (such as personally
     * identifiable information or card details).
     *
     * Keys written by applications must be 60 characters or less and must be in the character set
     * `[a-zA-Z0-9_-]`. Entries can also include metadata generated by Square. These keys are prefixed
     * with a namespace, separated from the key with a ':' character.
     *
     * Values have a maximum length of 255 characters.
     *
     * An application can have up to 10 entries per metadata field.
     *
     * Entries written by applications are private and can only be read or modified by the same
     * application.
     *
     * For more information, see  [Metadata](https://developer.squareup.com/docs/build-basics/metadata).
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Sets Metadata.
     *
     * Application-defined data attached to this order. Metadata fields are intended
     * to store descriptive references or associations with an entity in another system or store brief
     * information about the object. Square does not process this field; it only stores and returns it
     * in relevant API calls. Do not use metadata to store any sensitive information (such as personally
     * identifiable information or card details).
     *
     * Keys written by applications must be 60 characters or less and must be in the character set
     * `[a-zA-Z0-9_-]`. Entries can also include metadata generated by Square. These keys are prefixed
     * with a namespace, separated from the key with a ':' character.
     *
     * Values have a maximum length of 255 characters.
     *
     * An application can have up to 10 entries per metadata field.
     *
     * Entries written by applications are private and can only be read or modified by the same
     * application.
     *
     * For more information, see  [Metadata](https://developer.squareup.com/docs/build-basics/metadata).
     *
     * @maps metadata
     */
    public function setMetadata(array $metadata = null)
    {
        $this->metadata = $metadata;
    }

    /**
     * Returns Created At.
     *
     * The timestamp for when the order was created, in RFC 3339 format (for example, "2016-09-04T23:59:33.
     * 123Z").
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp for when the order was created, in RFC 3339 format (for example, "2016-09-04T23:59:33.
     * 123Z").
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The timestamp for when the order was last updated, in RFC 3339 format (for example, "2016-09-04T23:
     * 59:33.123Z").
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp for when the order was last updated, in RFC 3339 format (for example, "2016-09-04T23:
     * 59:33.123Z").
     *
     * @maps updated_at
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Closed At.
     *
     * The timestamp for when the order reached a terminal [state]($m/OrderState), in RFC 3339 format (for
     * example "2016-09-04T23:59:33.123Z").
     */
    public function getClosedAt()
    {
        return $this->closedAt;
    }

    /**
     * Sets Closed At.
     *
     * The timestamp for when the order reached a terminal [state]($m/OrderState), in RFC 3339 format (for
     * example "2016-09-04T23:59:33.123Z").
     *
     * @maps closed_at
     */
    public function setClosedAt($closedAt = null)
    {
        $this->closedAt = $closedAt;
    }

    /**
     * Returns State.
     *
     * The state of the order.
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Sets State.
     *
     * The state of the order.
     *
     * @maps state
     */
    public function setState($state = null)
    {
        $this->state = $state;
    }

    /**
     * Returns Version.
     *
     * The version number, which is incremented each time an update is committed to the order.
     * Orders not created through the API do not include a version number and
     * therefore cannot be updated.
     *
     * [Read more about working with versions](https://developer.squareup.com/docs/orders-api/manage-
     * orders#update-orders).
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * The version number, which is incremented each time an update is committed to the order.
     * Orders not created through the API do not include a version number and
     * therefore cannot be updated.
     *
     * [Read more about working with versions](https://developer.squareup.com/docs/orders-api/manage-
     * orders#update-orders).
     *
     * @maps version
     */
    public function setVersion($version = null)
    {
        $this->version = $version;
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
     * Returns Total Tip Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalTipMoney()
    {
        return $this->totalTipMoney;
    }

    /**
     * Sets Total Tip Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_tip_money
     */
    public function setTotalTipMoney(Money $totalTipMoney = null)
    {
        $this->totalTipMoney = $totalTipMoney;
    }

    /**
     * Returns Total Service Charge Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalServiceChargeMoney()
    {
        return $this->totalServiceChargeMoney;
    }

    /**
     * Sets Total Service Charge Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_service_charge_money
     */
    public function setTotalServiceChargeMoney(Money $totalServiceChargeMoney = null)
    {
        $this->totalServiceChargeMoney = $totalServiceChargeMoney;
    }

    /**
     * Returns Pricing Options.
     *
     * Pricing options for an order. The options affect how the order's price is calculated.
     * They can be used, for example, to apply automatic price adjustments that are based on preconfigured
     * [pricing rules]($m/CatalogPricingRule).
     */
    public function getPricingOptions()
    {
        return $this->pricingOptions;
    }

    /**
     * Sets Pricing Options.
     *
     * Pricing options for an order. The options affect how the order's price is calculated.
     * They can be used, for example, to apply automatic price adjustments that are based on preconfigured
     * [pricing rules]($m/CatalogPricingRule).
     *
     * @maps pricing_options
     */
    public function setPricingOptions(OrderPricingOptions $pricingOptions = null)
    {
        $this->pricingOptions = $pricingOptions;
    }

    /**
     * Returns Rewards.
     *
     * A set-like list of Rewards that have been added to the Order.
     *
     * @return OrderReward[]|null
     */
    public function getRewards()
    {
        return $this->rewards;
    }

    /**
     * Sets Rewards.
     *
     * A set-like list of Rewards that have been added to the Order.
     *
     * @maps rewards
     *
     * @param OrderReward[]|null $rewards
     */
    public function setRewards(array $rewards = null)
    {
        $this->rewards = $rewards;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']                         = $this->id;
        }
        $json['location_id']                    = $this->locationId;
        if (isset($this->referenceId)) {
            $json['reference_id']               = $this->referenceId;
        }
        if (isset($this->source)) {
            $json['source']                     = $this->source;
        }
        if (isset($this->customerId)) {
            $json['customer_id']                = $this->customerId;
        }
        if (isset($this->lineItems)) {
            $json['line_items']                 = $this->lineItems;
        }
        if (isset($this->taxes)) {
            $json['taxes']                      = $this->taxes;
        }
        if (isset($this->discounts)) {
            $json['discounts']                  = $this->discounts;
        }
        if (isset($this->serviceCharges)) {
            $json['service_charges']            = $this->serviceCharges;
        }
        if (isset($this->fulfillments)) {
            $json['fulfillments']               = $this->fulfillments;
        }
        if (isset($this->returns)) {
            $json['returns']                    = $this->returns;
        }
        if (isset($this->returnAmounts)) {
            $json['return_amounts']             = $this->returnAmounts;
        }
        if (isset($this->netAmounts)) {
            $json['net_amounts']                = $this->netAmounts;
        }
        if (isset($this->roundingAdjustment)) {
            $json['rounding_adjustment']        = $this->roundingAdjustment;
        }
        if (isset($this->tenders)) {
            $json['tenders']                    = $this->tenders;
        }
        if (isset($this->refunds)) {
            $json['refunds']                    = $this->refunds;
        }
        if (isset($this->metadata)) {
            $json['metadata']                   = $this->metadata;
        }
        if (isset($this->createdAt)) {
            $json['created_at']                 = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']                 = $this->updatedAt;
        }
        if (isset($this->closedAt)) {
            $json['closed_at']                  = $this->closedAt;
        }
        if (isset($this->state)) {
            $json['state']                      = $this->state;
        }
        if (isset($this->version)) {
            $json['version']                    = $this->version;
        }
        if (isset($this->totalMoney)) {
            $json['total_money']                = $this->totalMoney;
        }
        if (isset($this->totalTaxMoney)) {
            $json['total_tax_money']            = $this->totalTaxMoney;
        }
        if (isset($this->totalDiscountMoney)) {
            $json['total_discount_money']       = $this->totalDiscountMoney;
        }
        if (isset($this->totalTipMoney)) {
            $json['total_tip_money']            = $this->totalTipMoney;
        }
        if (isset($this->totalServiceChargeMoney)) {
            $json['total_service_charge_money'] = $this->totalServiceChargeMoney;
        }
        if (isset($this->pricingOptions)) {
            $json['pricing_options']            = $this->pricingOptions;
        }
        if (isset($this->rewards)) {
            $json['rewards']                    = $this->rewards;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
