<?php



namespace Square\Models;

/**
 * The list of possible dispute states.
 */
class DisputeState
{
    const UNKNOWN_STATE = 'UNKNOWN_STATE';

    const INQUIRY_EVIDENCE_REQUIRED = 'INQUIRY_EVIDENCE_REQUIRED';

    const INQUIRY_PROCESSING = 'INQUIRY_PROCESSING';

    const INQUIRY_CLOSED = 'INQUIRY_CLOSED';

    const EVIDENCE_REQUIRED = 'EVIDENCE_REQUIRED';

    const PROCESSING = 'PROCESSING';

    const WON = 'WON';

    const LOST = 'LOST';

    const ACCEPTED = 'ACCEPTED';

    const WAITING_THIRD_PARTY = 'WAITING_THIRD_PARTY';
}
