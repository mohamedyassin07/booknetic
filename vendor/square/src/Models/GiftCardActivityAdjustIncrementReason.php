<?php



namespace Square\Models;

class GiftCardActivityAdjustIncrementReason
{
    /**
     * Seller gifted a complimentary gift card balance increase.
     */
    const COMPLIMENTARY = 'COMPLIMENTARY';

    /**
     * The seller increased the gift card balance
     * to accommodate support issues.
     */
    const SUPPORT_ISSUE = 'SUPPORT_ISSUE';

    /**
     * The transaction is voided.
     */
    const TRANSACTION_VOIDED = 'TRANSACTION_VOIDED';
}
