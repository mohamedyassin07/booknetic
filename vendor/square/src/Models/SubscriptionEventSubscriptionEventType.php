<?php



namespace Square\Models;

/**
 * The possible subscription event types.
 */
class SubscriptionEventSubscriptionEventType
{
    /**
     * The subscription started.
     */
    const START_SUBSCRIPTION = 'START_SUBSCRIPTION';

    /**
     * The subscription plan changed.
     */
    const PLAN_CHANGE = 'PLAN_CHANGE';

    /**
     * The subscription stopped.
     */
    const STOP_SUBSCRIPTION = 'STOP_SUBSCRIPTION';

    /**
     * The subscription deactivated
     */
    const DEACTIVATE_SUBSCRIPTION = 'DEACTIVATE_SUBSCRIPTION';

    /**
     * The subscription resumed.
     */
    const RESUME_SUBSCRIPTION = 'RESUME_SUBSCRIPTION';
}
