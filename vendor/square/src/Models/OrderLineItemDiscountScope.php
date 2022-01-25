<?php



namespace Square\Models;

/**
 * Indicates whether this is a line-item or order-level discount.
 */
class OrderLineItemDiscountScope
{
    /**
     * Used for reporting only.
     * The original transaction discount scope is currently not supported by the API.
     */
    const OTHER_DISCOUNT_SCOPE = 'OTHER_DISCOUNT_SCOPE';

    /**
     * The discount should be applied to only line items specified by
     * `OrderLineItemAppliedDiscount` reference records.
     */
    const LINE_ITEM = 'LINE_ITEM';

    /**
     * The discount should be applied to the entire order.
     */
    const ORDER = 'ORDER';
}
