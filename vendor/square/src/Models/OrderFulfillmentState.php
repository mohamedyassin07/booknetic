<?php



namespace Square\Models;

/**
 * The current state of this fulfillment.
 */
class OrderFulfillmentState
{
    /**
     * Indicates that the fulfillment has been proposed.
     */
    const PROPOSED = 'PROPOSED';

    /**
     * Indicates that the fulfillment has been reserved.
     */
    const RESERVED = 'RESERVED';

    /**
     * Indicates that the fulfillment has been prepared.
     */
    const PREPARED = 'PREPARED';

    /**
     * Indicates that the fulfillment was successfully completed.
     */
    const COMPLETED = 'COMPLETED';

    /**
     * Indicates that the fulfillment was canceled.
     */
    const CANCELED = 'CANCELED';

    /**
     * Indicates that the fulfillment failed to be completed, but was not explicitly
     * canceled.
     */
    const FAILED = 'FAILED';
}
