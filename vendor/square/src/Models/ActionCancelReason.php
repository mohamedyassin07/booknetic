<?php



namespace Square\Models;

class ActionCancelReason
{
    /**
     * A person canceled the `TerminalCheckout` from a Square device.
     */
    const BUYER_CANCELED = 'BUYER_CANCELED';

    /**
     * A client canceled the `TerminalCheckout` using the API.
     */
    const SELLER_CANCELED = 'SELLER_CANCELED';

    /**
     * The `TerminalCheckout` timed out (see `deadline_duration` on the `TerminalCheckout`).
     */
    const TIMED_OUT = 'TIMED_OUT';
}
