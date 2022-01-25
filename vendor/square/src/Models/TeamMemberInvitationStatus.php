<?php



namespace Square\Models;

/**
 * Enumerates the possible invitation statuses the team member can have within a business.
 */
class TeamMemberInvitationStatus
{
    /**
     * The team member has not received an invitation.
     */
    const UNINVITED = 'UNINVITED';

    /**
     * The team member has received an invitation, but had not accepted it.
     */
    const PENDING = 'PENDING';

    /**
     * The team member has both received and accepted an invitation.
     */
    const ACCEPTED = 'ACCEPTED';
}
