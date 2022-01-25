<?php



namespace Square\Models;

/**
 * Time units of a service duration for bookings.
 */
class BusinessAppointmentSettingsAlignmentTime
{
    /**
     * The service duration unit is one visit of a fixed time interval specified by the seller.
     */
    const SERVICE_DURATION = 'SERVICE_DURATION';

    /**
     * The service duration unit is a 15-minute interval. Bookings can be scheduled every quarter hour.
     */
    const QUARTER_HOURLY = 'QUARTER_HOURLY';

    /**
     * The service duration unit is a 30-minute interval. Bookings can be scheduled every half hour.
     */
    const HALF_HOURLY = 'HALF_HOURLY';

    /**
     * The service duration unit is a 60-minute interval. Bookings can be scheduled every hour.
     */
    const HOURLY = 'HOURLY';
}
