<?php



namespace Square\Models;

/**
 * The order (e.g., chronological or alphabetical) in which results from a request are returned.
 */
class SortOrder
{
    /**
     * The results are returned in descending (e.g., newest-first or Z-A) order.
     */
    const DESC = 'DESC';

    /**
     * The results are returned in ascending (e.g., oldest-first or A-Z) order.
     */
    const ASC = 'ASC';
}
