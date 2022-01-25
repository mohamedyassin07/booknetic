<?php



namespace Square\Models;

/**
 * Types of location where service is provided.
 */
class BusinessAppointmentSettingsBookingLocationType
{
    /**
     * The service is provided at a seller location.
     */
    const BUSINESS_LOCATION = 'BUSINESS_LOCATION';

    /**
     * The service is provided at a customer location.
     */
    const CUSTOMER_LOCATION = 'CUSTOMER_LOCATION';

    /**
     * The service is provided over the phone.
     */
    const PHONE = 'PHONE';
}
