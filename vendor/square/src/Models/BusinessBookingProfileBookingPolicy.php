<?php



namespace Square\Models;

/**
 * Policies for accepting bookings.
 */
class BusinessBookingProfileBookingPolicy
{
    /**
     * The seller accepts all booking requests automatically.
     */
    const ACCEPT_ALL = 'ACCEPT_ALL';

    /**
     * The seller must accept requests to complete bookings.
     */
    const REQUIRES_ACCEPTANCE = 'REQUIRES_ACCEPTANCE';
}
