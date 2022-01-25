<?php



namespace Square\Models;

class V1OrderState
{
    const PENDING = 'PENDING';

    const OPEN = 'OPEN';

    const COMPLETED = 'COMPLETED';

    const CANCELED = 'CANCELED';

    const REFUNDED = 'REFUNDED';

    const REJECTED = 'REJECTED';
}
