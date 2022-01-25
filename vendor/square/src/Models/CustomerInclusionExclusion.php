<?php



namespace Square\Models;

/**
 * Indicates whether customers should be included in, or excluded from,
 * the result set when they match the filtering criteria.
 */
class CustomerInclusionExclusion
{
    /**
     * Customers should be included in the result set when they match the
     * filtering criteria.
     */
    const INCLUDE_ = 'INCLUDE';

    /**
     * Customers should be excluded from the result set when they match
     * the filtering criteria.
     */
    const EXCLUDE = 'EXCLUDE';
}
