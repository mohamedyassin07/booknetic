<?php



namespace Square\Models;

/**
 * Indicates whether this is a line-item or order-level tax.
 */
class OrderLineItemTaxScope
{
    /**
     * Used for reporting only.
     * The original transaction tax scope is currently not supported by the API.
     */
    const OTHER_TAX_SCOPE = 'OTHER_TAX_SCOPE';

    /**
     * The tax should be applied only to line items specified by
     * the `OrderLineItemAppliedTax` reference records.
     */
    const LINE_ITEM = 'LINE_ITEM';

    /**
     * The tax should be applied to the entire order.
     */
    const ORDER = 'ORDER';
}
