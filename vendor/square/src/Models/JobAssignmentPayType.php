<?php



namespace Square\Models;

/**
 * Enumerates the possible pay types that a job can be assigned.
 */
class JobAssignmentPayType
{
    /**
     * The job does not have a defined pay type.
     */
    const NONE = 'NONE';

    /**
     * The job pays an hourly rate.
     */
    const HOURLY = 'HOURLY';

    /**
     * The job pays an annual salary.
     */
    const SALARY = 'SALARY';
}
