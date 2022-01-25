<?php



namespace Square\Models;

/**
 * The schedule type of the pickup fulfillment.
 */
class OrderFulfillmentPickupDetailsScheduleType
{
    /**
     * Indicates that the fulfillment will be picked up at a scheduled pickup time.
     */
    const SCHEDULED = 'SCHEDULED';

    /**
     * Indicates that the fulfillment will be picked up as soon as possible and
     * should be prepared immediately.
     */
    const ASAP = 'ASAP';
}
