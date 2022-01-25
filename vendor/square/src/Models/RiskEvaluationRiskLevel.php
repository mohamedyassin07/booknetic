<?php



namespace Square\Models;

class RiskEvaluationRiskLevel
{
    /**
     * Indicates Square is still evaluating the payment.
     */
    const PENDING = 'PENDING';

    /**
     * Indicates payment risk is within the normal range.
     */
    const NORMAL = 'NORMAL';

    /**
     * Indicates elevated risk level associated with the payment.
     */
    const MODERATE = 'MODERATE';

    /**
     * Indicates significantly elevated risk level with the payment.
     */
    const HIGH = 'HIGH';
}
