<?php



namespace Square\Models;

class MerchantStatus
{
    /**
     * A fully operational merchant account. The merchant can interact with Square products and APIs.
     */
    const ACTIVE = 'ACTIVE';

    /**
     * A functionally limited merchant account. The merchant can only have limited interaction
     * via Square APIs. The merchant cannot access the seller dashboard.
     */
    const INACTIVE = 'INACTIVE';
}
