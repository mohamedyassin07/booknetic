<?php



namespace Square\Models;

/**
 * The wrapper object for the Catalog entries of a given object type.
 *
 * The type of a particular `CatalogObject` is determined by the value of the
 * `type` attribute and only the corresponding data attribute can be set on the `CatalogObject`
 * instance.
 * For example, the following list shows some instances of `CatalogObject` of a given `type` and
 * their corresponding data attribute that can be set:
 * - For a `CatalogObject` of the `ITEM` type, set the `item_data` attribute to yield the `CatalogItem`
 * object.
 * - For a `CatalogObject` of the `ITEM_VARIATION` type, set the `item_variation_data` attribute to
 * yield the `CatalogItemVariation` object.
 * - For a `CatalogObject` of the `MODIFIER` type, set the `modifier_data` attribute to yield the
 * `CatalogModifier` object.
 * - For a `CatalogObject` of the `MODIFIER_LIST` type, set the `modifier_list_data` attribute to yield
 * the `CatalogModifierList` object.
 * - For a `CatalogObject` of the `CATEGORY` type, set the `category_data` attribute to yield the
 * `CatalogCategory` object.
 * - For a `CatalogObject` of the `DISCOUNT` type, set the `discount_data` attribute to yield the
 * `CatalogDiscount` object.
 * - For a `CatalogObject` of the `TAX` type, set the `tax_data` attribute to yield the `CatalogTax`
 * object.
 * - For a `CatalogObject` of the `IMAGE` type, set the `image_data` attribute to yield the
 * `CatalogImageData`  object.
 * - For a `CatalogObject` of the `QUICK_AMOUNTS_SETTINGS` type, set the `quick_amounts_settings_data`
 * attribute to yield the `CatalogQuickAmountsSettings` object.
 * - For a `CatalogObject` of the `PRICING_RULE` type, set the `pricing_rule_data` attribute to yield
 * the `CatalogPricingRule` object.
 * - For a `CatalogObject` of the `TIME_PERIOD` type, set the `time_period_data` attribute to yield the
 * `CatalogTimePeriod` object.
 * - For a `CatalogObject` of the `PRODUCT_SET` type, set the `product_set_data` attribute to yield the
 * `CatalogProductSet`  object.
 * - For a `CatalogObject` of the `SUBSCRIPTION_PLAN` type, set the `subscription_plan_data` attribute
 * to yield the `CatalogSubscriptionPlan` object.
 *
 *
 * For a more detailed discussion of the Catalog data model, please see the
 * [Design a Catalog](https://developer.squareup.com/docs/catalog-api/design-a-catalog) guide.
 */
class CatalogObject implements \JsonSerializable
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var bool|null
     */
    private $isDeleted;

    /**
     * @var array|null
     */
    private $customAttributeValues;

    /**
     * @var CatalogV1Id[]|null
     */
    private $catalogV1Ids;

    /**
     * @var bool|null
     */
    private $presentAtAllLocations;

    /**
     * @var string[]|null
     */
    private $presentAtLocationIds;

    /**
     * @var string[]|null
     */
    private $absentAtLocationIds;

    /**
     * @var string|null
     */
    private $imageId;

    /**
     * @var CatalogItem|null
     */
    private $itemData;

    /**
     * @var CatalogCategory|null
     */
    private $categoryData;

    /**
     * @var CatalogItemVariation|null
     */
    private $itemVariationData;

    /**
     * @var CatalogTax|null
     */
    private $taxData;

    /**
     * @var CatalogDiscount|null
     */
    private $discountData;

    /**
     * @var CatalogModifierList|null
     */
    private $modifierListData;

    /**
     * @var CatalogModifier|null
     */
    private $modifierData;

    /**
     * @var CatalogTimePeriod|null
     */
    private $timePeriodData;

    /**
     * @var CatalogProductSet|null
     */
    private $productSetData;

    /**
     * @var CatalogPricingRule|null
     */
    private $pricingRuleData;

    /**
     * @var CatalogImage|null
     */
    private $imageData;

    /**
     * @var CatalogMeasurementUnit|null
     */
    private $measurementUnitData;

    /**
     * @var CatalogSubscriptionPlan|null
     */
    private $subscriptionPlanData;

    /**
     * @var CatalogItemOption|null
     */
    private $itemOptionData;

    /**
     * @var CatalogItemOptionValue|null
     */
    private $itemOptionValueData;

    /**
     * @var CatalogCustomAttributeDefinition|null
     */
    private $customAttributeDefinitionData;

    /**
     * @var CatalogQuickAmountsSettings|null
     */
    private $quickAmountsSettingsData;

    /**
     * @param $type
     * @param $id
     */
    public function __construct($type, $id)
    {
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * Returns Type.
     *
     * Possible types of CatalogObjects returned from the Catalog, each
     * containing type-specific properties in the `*_data` field corresponding to the object type.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Possible types of CatalogObjects returned from the Catalog, each
     * containing type-specific properties in the `*_data` field corresponding to the object type.
     *
     * @required
     * @maps type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns Id.
     *
     * An identifier to reference this object in the catalog. When a new `CatalogObject`
     * is inserted, the client should set the id to a temporary identifier starting with
     * a "`#`" character. Other objects being inserted or updated within the same request
     * may use this identifier to refer to the new object.
     *
     * When the server receives the new object, it will supply a unique identifier that
     * replaces the temporary identifier for all future references.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * An identifier to reference this object in the catalog. When a new `CatalogObject`
     * is inserted, the client should set the id to a temporary identifier starting with
     * a "`#`" character. Other objects being inserted or updated within the same request
     * may use this identifier to refer to the new object.
     *
     * When the server receives the new object, it will supply a unique identifier that
     * replaces the temporary identifier for all future references.
     *
     * @required
     * @maps id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns Updated At.
     *
     * Last modification [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * in RFC 3339 format, e.g., `"2016-08-15T23:59:33.123Z"`
     * would indicate the UTC time (denoted by `Z`) of August 15, 2016 at 23:59:33 and 123 milliseconds.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * Last modification [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * in RFC 3339 format, e.g., `"2016-08-15T23:59:33.123Z"`
     * would indicate the UTC time (denoted by `Z`) of August 15, 2016 at 23:59:33 and 123 milliseconds.
     *
     * @maps updated_at
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Version.
     *
     * The version of the object. When updating an object, the version supplied
     * must match the version in the database, otherwise the write will be rejected as conflicting.
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * The version of the object. When updating an object, the version supplied
     * must match the version in the database, otherwise the write will be rejected as conflicting.
     *
     * @maps version
     */
    public function setVersion($version = null)
    {
        $this->version = $version;
    }

    /**
     * Returns Is Deleted.
     *
     * If `true`, the object has been deleted from the database. Must be `false` for new objects
     * being inserted. When deleted, the `updated_at` field will equal the deletion time.
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Sets Is Deleted.
     *
     * If `true`, the object has been deleted from the database. Must be `false` for new objects
     * being inserted. When deleted, the `updated_at` field will equal the deletion time.
     *
     * @maps is_deleted
     */
    public function setIsDeleted($isDeleted = null)
    {
        $this->isDeleted = $isDeleted;
    }

    /**
     * Returns Custom Attribute Values.
     *
     * A map (key-value pairs) of application-defined custom attribute values. The value of a key-value
     * pair
     * is a [CatalogCustomAttributeValue]($m/CatalogCustomAttributeValue) object. The key is the `key`
     * attribute
     * value defined in the associated
     * [CatalogCustomAttributeDefinition]($m/CatalogCustomAttributeDefinition)
     * object defined by the application making the request.
     *
     * If the `CatalogCustomAttributeDefinition` object is
     * defined by another application, the `CatalogCustomAttributeDefinition`'s key attribute value is
     * prefixed by
     * the defining application ID. For example, if the `CatalogCustomAttributeDefinition` has a `key`
     * attribute of
     * `"cocoa_brand"` and the defining application ID is `"abcd1234"`, the key in the map is `"abcd1234:
     * cocoa_brand"`
     * if the application making the request is different from the application defining the custom
     * attribute definition.
     * Otherwise, the key used in the map is simply `"cocoa_brand"`.
     *
     * Application-defined custom attributes that are set at a global (location-independent) level.
     * Custom attribute values are intended to store additional information about a catalog object
     * or associations with an entity in another system. Do not use custom attributes
     * to store any sensitive information (personally identifiable information, card details, etc.).
     */
    public function getCustomAttributeValues()
    {
        return $this->customAttributeValues;
    }

    /**
     * Sets Custom Attribute Values.
     *
     * A map (key-value pairs) of application-defined custom attribute values. The value of a key-value
     * pair
     * is a [CatalogCustomAttributeValue]($m/CatalogCustomAttributeValue) object. The key is the `key`
     * attribute
     * value defined in the associated
     * [CatalogCustomAttributeDefinition]($m/CatalogCustomAttributeDefinition)
     * object defined by the application making the request.
     *
     * If the `CatalogCustomAttributeDefinition` object is
     * defined by another application, the `CatalogCustomAttributeDefinition`'s key attribute value is
     * prefixed by
     * the defining application ID. For example, if the `CatalogCustomAttributeDefinition` has a `key`
     * attribute of
     * `"cocoa_brand"` and the defining application ID is `"abcd1234"`, the key in the map is `"abcd1234:
     * cocoa_brand"`
     * if the application making the request is different from the application defining the custom
     * attribute definition.
     * Otherwise, the key used in the map is simply `"cocoa_brand"`.
     *
     * Application-defined custom attributes that are set at a global (location-independent) level.
     * Custom attribute values are intended to store additional information about a catalog object
     * or associations with an entity in another system. Do not use custom attributes
     * to store any sensitive information (personally identifiable information, card details, etc.).
     *
     * @maps custom_attribute_values
     */
    public function setCustomAttributeValues(array $customAttributeValues = null)
    {
        $this->customAttributeValues = $customAttributeValues;
    }

    /**
     * Returns Catalog V1 Ids.
     *
     * The Connect v1 IDs for this object at each location where it is present, where they
     * differ from the object's Connect V2 ID. The field will only be present for objects that
     * have been created or modified by legacy APIs.
     *
     * @return CatalogV1Id[]|null
     */
    public function getCatalogV1Ids()
    {
        return $this->catalogV1Ids;
    }

    /**
     * Sets Catalog V1 Ids.
     *
     * The Connect v1 IDs for this object at each location where it is present, where they
     * differ from the object's Connect V2 ID. The field will only be present for objects that
     * have been created or modified by legacy APIs.
     *
     * @maps catalog_v1_ids
     *
     * @param CatalogV1Id[]|null $catalogV1Ids
     */
    public function setCatalogV1Ids(array $catalogV1Ids = null)
    {
        $this->catalogV1Ids = $catalogV1Ids;
    }

    /**
     * Returns Present at All Locations.
     *
     * If `true`, this object is present at all locations (including future locations), except where
     * specified in
     * the `absent_at_location_ids` field. If `false`, this object is not present at any locations
     * (including future locations),
     * except where specified in the `present_at_location_ids` field. If not specified, defaults to `true`.
     */
    public function getPresentAtAllLocations()
    {
        return $this->presentAtAllLocations;
    }

    /**
     * Sets Present at All Locations.
     *
     * If `true`, this object is present at all locations (including future locations), except where
     * specified in
     * the `absent_at_location_ids` field. If `false`, this object is not present at any locations
     * (including future locations),
     * except where specified in the `present_at_location_ids` field. If not specified, defaults to `true`.
     *
     * @maps present_at_all_locations
     */
    public function setPresentAtAllLocations($presentAtAllLocations = null)
    {
        $this->presentAtAllLocations = $presentAtAllLocations;
    }

    /**
     * Returns Present at Location Ids.
     *
     * A list of locations where the object is present, even if `present_at_all_locations` is `false`.
     * This can include locations that are deactivated.
     *
     * @return string[]|null
     */
    public function getPresentAtLocationIds()
    {
        return $this->presentAtLocationIds;
    }

    /**
     * Sets Present at Location Ids.
     *
     * A list of locations where the object is present, even if `present_at_all_locations` is `false`.
     * This can include locations that are deactivated.
     *
     * @maps present_at_location_ids
     *
     * @param string[]|null $presentAtLocationIds
     */
    public function setPresentAtLocationIds(array $presentAtLocationIds = null)
    {
        $this->presentAtLocationIds = $presentAtLocationIds;
    }

    /**
     * Returns Absent at Location Ids.
     *
     * A list of locations where the object is not present, even if `present_at_all_locations` is `true`.
     * This can include locations that are deactivated.
     *
     * @return string[]|null
     */
    public function getAbsentAtLocationIds()
    {
        return $this->absentAtLocationIds;
    }

    /**
     * Sets Absent at Location Ids.
     *
     * A list of locations where the object is not present, even if `present_at_all_locations` is `true`.
     * This can include locations that are deactivated.
     *
     * @maps absent_at_location_ids
     *
     * @param string[]|null $absentAtLocationIds
     */
    public function setAbsentAtLocationIds(array $absentAtLocationIds = null)
    {
        $this->absentAtLocationIds = $absentAtLocationIds;
    }

    /**
     * Returns Image Id.
     *
     * Identifies the `CatalogImage` attached to this `CatalogObject`.
     */
    public function getImageId()
    {
        return $this->imageId;
    }

    /**
     * Sets Image Id.
     *
     * Identifies the `CatalogImage` attached to this `CatalogObject`.
     *
     * @maps image_id
     */
    public function setImageId($imageId = null)
    {
        $this->imageId = $imageId;
    }

    /**
     * Returns Item Data.
     *
     * A [CatalogObject]($m/CatalogObject) instance of the `ITEM` type, also referred to as an item, in the
     * catalog.
     */
    public function getItemData()
    {
        return $this->itemData;
    }

    /**
     * Sets Item Data.
     *
     * A [CatalogObject]($m/CatalogObject) instance of the `ITEM` type, also referred to as an item, in the
     * catalog.
     *
     * @maps item_data
     */
    public function setItemData(CatalogItem $itemData = null)
    {
        $this->itemData = $itemData;
    }

    /**
     * Returns Category Data.
     *
     * A category to which a `CatalogItem` instance belongs.
     */
    public function getCategoryData()
    {
        return $this->categoryData;
    }

    /**
     * Sets Category Data.
     *
     * A category to which a `CatalogItem` instance belongs.
     *
     * @maps category_data
     */
    public function setCategoryData(CatalogCategory $categoryData = null)
    {
        $this->categoryData = $categoryData;
    }

    /**
     * Returns Item Variation Data.
     *
     * An item variation (i.e., product) in the Catalog object model. Each item
     * may have a maximum of 250 item variations.
     */
    public function getItemVariationData()
    {
        return $this->itemVariationData;
    }

    /**
     * Sets Item Variation Data.
     *
     * An item variation (i.e., product) in the Catalog object model. Each item
     * may have a maximum of 250 item variations.
     *
     * @maps item_variation_data
     */
    public function setItemVariationData(CatalogItemVariation $itemVariationData = null)
    {
        $this->itemVariationData = $itemVariationData;
    }

    /**
     * Returns Tax Data.
     *
     * A tax applicable to an item.
     */
    public function getTaxData()
    {
        return $this->taxData;
    }

    /**
     * Sets Tax Data.
     *
     * A tax applicable to an item.
     *
     * @maps tax_data
     */
    public function setTaxData(CatalogTax $taxData = null)
    {
        $this->taxData = $taxData;
    }

    /**
     * Returns Discount Data.
     *
     * A discount applicable to items.
     */
    public function getDiscountData()
    {
        return $this->discountData;
    }

    /**
     * Sets Discount Data.
     *
     * A discount applicable to items.
     *
     * @maps discount_data
     */
    public function setDiscountData(CatalogDiscount $discountData = null)
    {
        $this->discountData = $discountData;
    }

    /**
     * Returns Modifier List Data.
     *
     * A list of modifiers applicable to items at the time of sale.
     *
     * For example, a "Condiments" modifier list applicable to a "Hot Dog" item
     * may contain "Ketchup", "Mustard", and "Relish" modifiers.
     * Use the `selection_type` field to specify whether or not multiple selections from
     * the modifier list are allowed.
     */
    public function getModifierListData()
    {
        return $this->modifierListData;
    }

    /**
     * Sets Modifier List Data.
     *
     * A list of modifiers applicable to items at the time of sale.
     *
     * For example, a "Condiments" modifier list applicable to a "Hot Dog" item
     * may contain "Ketchup", "Mustard", and "Relish" modifiers.
     * Use the `selection_type` field to specify whether or not multiple selections from
     * the modifier list are allowed.
     *
     * @maps modifier_list_data
     */
    public function setModifierListData(CatalogModifierList $modifierListData = null)
    {
        $this->modifierListData = $modifierListData;
    }

    /**
     * Returns Modifier Data.
     *
     * A modifier applicable to items at the time of sale.
     */
    public function getModifierData()
    {
        return $this->modifierData;
    }

    /**
     * Sets Modifier Data.
     *
     * A modifier applicable to items at the time of sale.
     *
     * @maps modifier_data
     */
    public function setModifierData(CatalogModifier $modifierData = null)
    {
        $this->modifierData = $modifierData;
    }

    /**
     * Returns Time Period Data.
     *
     * Represents a time period - either a single period or a repeating period.
     */
    public function getTimePeriodData()
    {
        return $this->timePeriodData;
    }

    /**
     * Sets Time Period Data.
     *
     * Represents a time period - either a single period or a repeating period.
     *
     * @maps time_period_data
     */
    public function setTimePeriodData(CatalogTimePeriod $timePeriodData = null)
    {
        $this->timePeriodData = $timePeriodData;
    }

    /**
     * Returns Product Set Data.
     *
     * Represents a collection of catalog objects for the purpose of applying a
     * `PricingRule`. Including a catalog object will include all of its subtypes.
     * For example, including a category in a product set will include all of its
     * items and associated item variations in the product set. Including an item in
     * a product set will also include its item variations.
     */
    public function getProductSetData()
    {
        return $this->productSetData;
    }

    /**
     * Sets Product Set Data.
     *
     * Represents a collection of catalog objects for the purpose of applying a
     * `PricingRule`. Including a catalog object will include all of its subtypes.
     * For example, including a category in a product set will include all of its
     * items and associated item variations in the product set. Including an item in
     * a product set will also include its item variations.
     *
     * @maps product_set_data
     */
    public function setProductSetData(CatalogProductSet $productSetData = null)
    {
        $this->productSetData = $productSetData;
    }

    /**
     * Returns Pricing Rule Data.
     *
     * Defines how discounts are automatically applied to a set of items that match the pricing rule
     * during the active time period.
     */
    public function getPricingRuleData()
    {
        return $this->pricingRuleData;
    }

    /**
     * Sets Pricing Rule Data.
     *
     * Defines how discounts are automatically applied to a set of items that match the pricing rule
     * during the active time period.
     *
     * @maps pricing_rule_data
     */
    public function setPricingRuleData(CatalogPricingRule $pricingRuleData = null)
    {
        $this->pricingRuleData = $pricingRuleData;
    }

    /**
     * Returns Image Data.
     *
     * An image file to use in Square catalogs. It can be associated with catalog
     * items, item variations, and categories.
     */
    public function getImageData()
    {
        return $this->imageData;
    }

    /**
     * Sets Image Data.
     *
     * An image file to use in Square catalogs. It can be associated with catalog
     * items, item variations, and categories.
     *
     * @maps image_data
     */
    public function setImageData(CatalogImage $imageData = null)
    {
        $this->imageData = $imageData;
    }

    /**
     * Returns Measurement Unit Data.
     *
     * Represents the unit used to measure a `CatalogItemVariation` and
     * specifies the precision for decimal quantities.
     */
    public function getMeasurementUnitData()
    {
        return $this->measurementUnitData;
    }

    /**
     * Sets Measurement Unit Data.
     *
     * Represents the unit used to measure a `CatalogItemVariation` and
     * specifies the precision for decimal quantities.
     *
     * @maps measurement_unit_data
     */
    public function setMeasurementUnitData(CatalogMeasurementUnit $measurementUnitData = null)
    {
        $this->measurementUnitData = $measurementUnitData;
    }

    /**
     * Returns Subscription Plan Data.
     *
     * Describes a subscription plan. For more information, see
     * [Set Up and Manage a Subscription Plan](https://developer.squareup.com/docs/subscriptions-api/setup-
     * plan).
     */
    public function getSubscriptionPlanData()
    {
        return $this->subscriptionPlanData;
    }

    /**
     * Sets Subscription Plan Data.
     *
     * Describes a subscription plan. For more information, see
     * [Set Up and Manage a Subscription Plan](https://developer.squareup.com/docs/subscriptions-api/setup-
     * plan).
     *
     * @maps subscription_plan_data
     */
    public function setSubscriptionPlanData(CatalogSubscriptionPlan $subscriptionPlanData = null)
    {
        $this->subscriptionPlanData = $subscriptionPlanData;
    }

    /**
     * Returns Item Option Data.
     *
     * A group of variations for a `CatalogItem`.
     */
    public function getItemOptionData()
    {
        return $this->itemOptionData;
    }

    /**
     * Sets Item Option Data.
     *
     * A group of variations for a `CatalogItem`.
     *
     * @maps item_option_data
     */
    public function setItemOptionData(CatalogItemOption $itemOptionData = null)
    {
        $this->itemOptionData = $itemOptionData;
    }

    /**
     * Returns Item Option Value Data.
     *
     * An enumerated value that can link a
     * `CatalogItemVariation` to an item option as one of
     * its item option values.
     */
    public function getItemOptionValueData()
    {
        return $this->itemOptionValueData;
    }

    /**
     * Sets Item Option Value Data.
     *
     * An enumerated value that can link a
     * `CatalogItemVariation` to an item option as one of
     * its item option values.
     *
     * @maps item_option_value_data
     */
    public function setItemOptionValueData(CatalogItemOptionValue $itemOptionValueData = null)
    {
        $this->itemOptionValueData = $itemOptionValueData;
    }

    /**
     * Returns Custom Attribute Definition Data.
     *
     * Contains information defining a custom attribute. Custom attributes are
     * intended to store additional information about a catalog object or to associate a
     * catalog object with an entity in another system. Do not use custom attributes
     * to store any sensitive information (personally identifiable information, card details, etc.).
     * [Read more about custom attributes](https://developer.squareup.com/docs/catalog-api/add-custom-
     * attributes)
     */
    public function getCustomAttributeDefinitionData()
    {
        return $this->customAttributeDefinitionData;
    }

    /**
     * Sets Custom Attribute Definition Data.
     *
     * Contains information defining a custom attribute. Custom attributes are
     * intended to store additional information about a catalog object or to associate a
     * catalog object with an entity in another system. Do not use custom attributes
     * to store any sensitive information (personally identifiable information, card details, etc.).
     * [Read more about custom attributes](https://developer.squareup.com/docs/catalog-api/add-custom-
     * attributes)
     *
     * @maps custom_attribute_definition_data
     */
    public function setCustomAttributeDefinitionData(
        CatalogCustomAttributeDefinition $customAttributeDefinitionData = null
    ) {
        $this->customAttributeDefinitionData = $customAttributeDefinitionData;
    }

    /**
     * Returns Quick Amounts Settings Data.
     *
     * A parent Catalog Object model represents a set of Quick Amounts and the settings control the amounts.
     */
    public function getQuickAmountsSettingsData()
    {
        return $this->quickAmountsSettingsData;
    }

    /**
     * Sets Quick Amounts Settings Data.
     *
     * A parent Catalog Object model represents a set of Quick Amounts and the settings control the amounts.
     *
     * @maps quick_amounts_settings_data
     */
    public function setQuickAmountsSettingsData(CatalogQuickAmountsSettings $quickAmountsSettingsData = null)
    {
        $this->quickAmountsSettingsData = $quickAmountsSettingsData;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['type']                                 = $this->type;
        $json['id']                                   = $this->id;
        if (isset($this->updatedAt)) {
            $json['updated_at']                       = $this->updatedAt;
        }
        if (isset($this->version)) {
            $json['version']                          = $this->version;
        }
        if (isset($this->isDeleted)) {
            $json['is_deleted']                       = $this->isDeleted;
        }
        if (isset($this->customAttributeValues)) {
            $json['custom_attribute_values']          = $this->customAttributeValues;
        }
        if (isset($this->catalogV1Ids)) {
            $json['catalog_v1_ids']                   = $this->catalogV1Ids;
        }
        if (isset($this->presentAtAllLocations)) {
            $json['present_at_all_locations']         = $this->presentAtAllLocations;
        }
        if (isset($this->presentAtLocationIds)) {
            $json['present_at_location_ids']          = $this->presentAtLocationIds;
        }
        if (isset($this->absentAtLocationIds)) {
            $json['absent_at_location_ids']           = $this->absentAtLocationIds;
        }
        if (isset($this->imageId)) {
            $json['image_id']                         = $this->imageId;
        }
        if (isset($this->itemData)) {
            $json['item_data']                        = $this->itemData;
        }
        if (isset($this->categoryData)) {
            $json['category_data']                    = $this->categoryData;
        }
        if (isset($this->itemVariationData)) {
            $json['item_variation_data']              = $this->itemVariationData;
        }
        if (isset($this->taxData)) {
            $json['tax_data']                         = $this->taxData;
        }
        if (isset($this->discountData)) {
            $json['discount_data']                    = $this->discountData;
        }
        if (isset($this->modifierListData)) {
            $json['modifier_list_data']               = $this->modifierListData;
        }
        if (isset($this->modifierData)) {
            $json['modifier_data']                    = $this->modifierData;
        }
        if (isset($this->timePeriodData)) {
            $json['time_period_data']                 = $this->timePeriodData;
        }
        if (isset($this->productSetData)) {
            $json['product_set_data']                 = $this->productSetData;
        }
        if (isset($this->pricingRuleData)) {
            $json['pricing_rule_data']                = $this->pricingRuleData;
        }
        if (isset($this->imageData)) {
            $json['image_data']                       = $this->imageData;
        }
        if (isset($this->measurementUnitData)) {
            $json['measurement_unit_data']            = $this->measurementUnitData;
        }
        if (isset($this->subscriptionPlanData)) {
            $json['subscription_plan_data']           = $this->subscriptionPlanData;
        }
        if (isset($this->itemOptionData)) {
            $json['item_option_data']                 = $this->itemOptionData;
        }
        if (isset($this->itemOptionValueData)) {
            $json['item_option_value_data']           = $this->itemOptionValueData;
        }
        if (isset($this->customAttributeDefinitionData)) {
            $json['custom_attribute_definition_data'] = $this->customAttributeDefinitionData;
        }
        if (isset($this->quickAmountsSettingsData)) {
            $json['quick_amounts_settings_data']      = $this->quickAmountsSettingsData;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
