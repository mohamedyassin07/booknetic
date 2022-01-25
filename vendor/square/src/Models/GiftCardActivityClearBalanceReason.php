<?php



namespace Square\Models;

class GiftCardActivityClearBalanceReason
{
    /**
     * The seller suspects suspicious activity.
     */
    const SUSPICIOUS_ACTIVITY = 'SUSPICIOUS_ACTIVITY';

    /**
     * The seller cleared the balance to reuse the gift card.
     */
    const REUSE_GIFTCARD = 'REUSE_GIFTCARD';

    /**
     * The gift card balance was cleared for an unknown reason.
     */
    const UNKNOWN_REASON = 'UNKNOWN_REASON';
}
