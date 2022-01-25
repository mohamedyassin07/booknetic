<?php



namespace Square\Models;

/**
 * The possible subscription event info codes.
 */
class SubscriptionEventInfoCode
{
    /**
     * The location is not active.
     */
    const LOCATION_NOT_ACTIVE = 'LOCATION_NOT_ACTIVE';

    /**
     * The location cannot accept payments.
     */
    const LOCATION_CANNOT_ACCEPT_PAYMENT = 'LOCATION_CANNOT_ACCEPT_PAYMENT';

    /**
     * The customer has been deleted.
     */
    const CUSTOMER_DELETED = 'CUSTOMER_DELETED';

    /**
     * The customer doesn't have an email.
     */
    const CUSTOMER_NO_EMAIL = 'CUSTOMER_NO_EMAIL';

    /**
     * The customer doesn't have a name.
     */
    const CUSTOMER_NO_NAME = 'CUSTOMER_NO_NAME';
}
