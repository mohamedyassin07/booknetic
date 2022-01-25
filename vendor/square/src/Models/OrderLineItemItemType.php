<?php



namespace Square\Models;

/**
 * Represents the line item type.
 */
class OrderLineItemItemType
{
    /**
     * Indicates that the line item is an itemized sale.
     */
    const ITEM = 'ITEM';

    /**
     * Indicates that the line item is a non-itemized sale.
     */
    const CUSTOM_AMOUNT = 'CUSTOM_AMOUNT';

    /**
     * Indicates that the line item is a gift card sale. Gift cards sold through
     * the Orders API are sold in an unactivated state and can be activated through the
     * Gift Cards API using the line item `uid`.
     */
    const GIFT_CARD = 'GIFT_CARD';
}
