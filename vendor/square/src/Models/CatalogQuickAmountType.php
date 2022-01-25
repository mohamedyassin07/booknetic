<?php



namespace Square\Models;

/**
 * Determines the type of a specific Quick Amount.
 */
class CatalogQuickAmountType
{
    /**
     * Quick Amount is created manually by the seller.
     */
    const QUICK_AMOUNT_TYPE_MANUAL = 'QUICK_AMOUNT_TYPE_MANUAL';

    /**
     * Quick Amount is generated automatically by machine learning algorithms.
     */
    const QUICK_AMOUNT_TYPE_AUTO = 'QUICK_AMOUNT_TYPE_AUTO';
}
