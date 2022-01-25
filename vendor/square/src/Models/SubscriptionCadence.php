<?php



namespace Square\Models;

/**
 * Determines the billing cadence of a [Subscription]($m/Subscription)
 */
class SubscriptionCadence
{
    /**
     * Once per day
     */
    const DAILY = 'DAILY';

    /**
     * Once per week
     */
    const WEEKLY = 'WEEKLY';

    /**
     * Every two weeks
     */
    const EVERY_TWO_WEEKS = 'EVERY_TWO_WEEKS';

    /**
     * Once every 30 days
     */
    const THIRTY_DAYS = 'THIRTY_DAYS';

    /**
     * Once every 60 days
     */
    const SIXTY_DAYS = 'SIXTY_DAYS';

    /**
     * Once every 90 days
     */
    const NINETY_DAYS = 'NINETY_DAYS';

    /**
     * Once per month
     */
    const MONTHLY = 'MONTHLY';

    /**
     * Once every two months
     */
    const EVERY_TWO_MONTHS = 'EVERY_TWO_MONTHS';

    /**
     * Once every three months
     */
    const QUARTERLY = 'QUARTERLY';

    /**
     * Once every four months
     */
    const EVERY_FOUR_MONTHS = 'EVERY_FOUR_MONTHS';

    /**
     * Once every six months
     */
    const EVERY_SIX_MONTHS = 'EVERY_SIX_MONTHS';

    /**
     * Once per year
     */
    const ANNUAL = 'ANNUAL';

    /**
     * Once every two years
     */
    const EVERY_TWO_YEARS = 'EVERY_TWO_YEARS';
}
