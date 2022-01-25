<?php



namespace Square\Models;

class V1SettlementEntryType
{
    /**
     * A manual adjustment applied to the merchant's account by Square
     */
    const ADJUSTMENT = 'ADJUSTMENT';

    /**
     * A payment from an existing Square balance, such as a gift card
     */
    const BALANCE_CHARGE = 'BALANCE_CHARGE';

    /**
     * A credit card payment CAPTURE
     */
    const CHARGE = 'CHARGE';

    /**
     * Square offers Free Payments Processing for a variety of business scenarios including seller
     * referral or when we want to apologize for a bug, customer service, repricing complication, etc. This
     * entry represents a credit to the merchant for the purposes of Free Processing.
     */
    const FREE_PROCESSING = 'FREE_PROCESSING';

    /**
     * An adjustment made by Square related to holding/releasing a payment
     */
    const HOLD_ADJUSTMENT = 'HOLD_ADJUSTMENT';

    /**
     * a fee paid to a 3rd party merchant
     */
    const PAID_SERVICE_FEE = 'PAID_SERVICE_FEE';

    /**
     * a refund for a 3rd party merchant fee
     */
    const PAID_SERVICE_FEE_REFUND = 'PAID_SERVICE_FEE_REFUND';

    /**
     * Repayment for a redemption code
     */
    const REDEMPTION_CODE = 'REDEMPTION_CODE';

    /**
     * A refund for an existing card payment
     */
    const REFUND = 'REFUND';

    /**
     * An entry created when we receive a response for the ACH file we sent indicating that the settlement
     * of the original entry failed.
     */
    const RETURNED_PAYOUT = 'RETURNED_PAYOUT';

    /**
     * Initial deposit to a merchant for a Capital merchant cash advance (MCA).
     */
    const SQUARE_CAPITAL_ADVANCE = 'SQUARE_CAPITAL_ADVANCE';

    /**
     * Capital merchant cash advance (MCA) assessment. These are, generally, proportional to the
     * merchant's sales but may be issued for other reasons related to the MCA.
     */
    const SQUARE_CAPITAL_PAYMENT = 'SQUARE_CAPITAL_PAYMENT';

    /**
     * Capital merchant cash advance (MCA) assessment refund. These are, generally, proportional to the
     * merchant's refunds but may be issued for other reasons related to the MCA.
     */
    const SQUARE_CAPITAL_REVERSED_PAYMENT = 'SQUARE_CAPITAL_REVERSED_PAYMENT';

    /**
     * Fee charged for subscription to a Square product
     */
    const SUBSCRIPTION_FEE = 'SUBSCRIPTION_FEE';

    /**
     * Refund of a previously charged Square product subscription fee.
     */
    const SUBSCRIPTION_FEE_REFUND = 'SUBSCRIPTION_FEE_REFUND';

    const OTHER = 'OTHER';

    /**
     * A payment in which Square covers part of the funds for a purchase
     */
    const INCENTED_PAYMENT = 'INCENTED_PAYMENT';

    /**
     * A settlement failed to be processed and the settlement amount has been returned to the account
     */
    const RETURNED_ACH_ENTRY = 'RETURNED_ACH_ENTRY';

    /**
     * Refund for cancelling a Square Plus subscription
     */
    const RETURNED_SQUARE_275 = 'RETURNED_SQUARE_275';

    /**
     * Fee charged for a Square Plus subscription ($275)
     */
    const SQUARE_275 = 'SQUARE_275';

    /**
     * Settlements to or withdrawals from the Square Card (an asset)
     */
    const SQUARE_CARD = 'SQUARE_CARD';
}
