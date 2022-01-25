<?php



namespace Square\Models;

/**
 * The type of fulfillment.
 */
class OrderFulfillmentType
{
    /**
     * A fulfillment to be picked up from a physical [location]($m/Location)
     * by a recipient.
     */
    const PICKUP = 'PICKUP';

    /**
     * A fulfillment to be shipped by a shipping carrier.
     */
    const SHIPMENT = 'SHIPMENT';
}
