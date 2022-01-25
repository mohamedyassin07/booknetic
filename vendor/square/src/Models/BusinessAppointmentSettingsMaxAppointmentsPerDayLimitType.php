<?php



namespace Square\Models;

/**
 * Types of daily appointment limits.
 */
class BusinessAppointmentSettingsMaxAppointmentsPerDayLimitType
{
    /**
     * The maximum number of daily appointments is set on a per team member basis.
     */
    const PER_TEAM_MEMBER = 'PER_TEAM_MEMBER';

    /**
     * The maximum number of daily appointments is set on a per location basis.
     */
    const PER_LOCATION = 'PER_LOCATION';
}
