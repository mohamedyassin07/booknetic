<?php



namespace Square\Models;

/**
 * The category of the seller’s cancellation policy.
 */
class BusinessAppointmentSettingsCancellationPolicy
{
    /**
     * Cancellations are treated as no shows and may incur a fee as specified by `cancellation_fee_money`.
     */
    const CANCELLATION_TREATED_AS_NO_SHOW = 'CANCELLATION_TREATED_AS_NO_SHOW';

    /**
     * Cancellations follow the seller-specified policy that is described in free-form text and not
     * enforced automatically by Square.
     */
    const CUSTOM_POLICY = 'CUSTOM_POLICY';
}
