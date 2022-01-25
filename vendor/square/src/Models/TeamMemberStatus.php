<?php



namespace Square\Models;

/**
 * Enumerates the possible statuses the team member can have within a business.
 */
class TeamMemberStatus
{
    /**
     * The team member can sign in to Point of Sale and the Seller Dashboard.
     */
    const ACTIVE = 'ACTIVE';

    /**
     * The team member can no longer sign in to Point of Sale or the Seller Dashboard,
     * but the team member's sales reports remain available.
     */
    const INACTIVE = 'INACTIVE';
}
