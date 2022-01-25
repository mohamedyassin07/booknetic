<?php



namespace Square\Models;

class GiftCardActivityAdjustDecrementReason
{
    /**
     * The seller determined suspicious activity by the buyer.
     */
    const SUSPICIOUS_ACTIVITY = 'SUSPICIOUS_ACTIVITY';

    /**
     * The seller previously increased the gift card balance by accident.
     */
    const BALANCE_ACCIDENTALLY_INCREASED = 'BALANCE_ACCIDENTALLY_INCREASED';

    /**
     * The seller decreased the gift card balance to
     * accommodate support issues.
     */
    const SUPPORT_ISSUE = 'SUPPORT_ISSUE';
}
