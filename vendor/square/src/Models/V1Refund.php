<?php



namespace Square\Models;

/**
 * V1Refund
 */
class V1Refund implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $reason;

    /**
     * @var V1Money|null
     */
    private $refundedMoney;

    /**
     * @var V1Money|null
     */
    private $refundedProcessingFeeMoney;

    /**
     * @var V1Money|null
     */
    private $refundedTaxMoney;

    /**
     * @var V1Money|null
     */
    private $refundedAdditiveTaxMoney;

    /**
     * @var V1PaymentTax[]|null
     */
    private $refundedAdditiveTax;

    /**
     * @var V1Money|null
     */
    private $refundedInclusiveTaxMoney;

    /**
     * @var V1PaymentTax[]|null
     */
    private $refundedInclusiveTax;

    /**
     * @var V1Money|null
     */
    private $refundedTipMoney;

    /**
     * @var V1Money|null
     */
    private $refundedDiscountMoney;

    /**
     * @var V1Money|null
     */
    private $refundedSurchargeMoney;

    /**
     * @var V1PaymentSurcharge[]|null
     */
    private $refundedSurcharges;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $processedAt;

    /**
     * @var string|null
     */
    private $paymentId;

    /**
     * @var string|null
     */
    private $merchantId;

    /**
     * @var bool|null
     */
    private $isExchange;

    /**
     * Returns Type.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * @maps type
     */
    public function setType($type = null)
    {
        $this->type = $type;
    }

    /**
     * Returns Reason.
     *
     * The merchant-specified reason for the refund.
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Sets Reason.
     *
     * The merchant-specified reason for the refund.
     *
     * @maps reason
     */
    public function setReason($reason = null)
    {
        $this->reason = $reason;
    }

    /**
     * Returns Refunded Money.
     */
    public function getRefundedMoney()
    {
        return $this->refundedMoney;
    }

    /**
     * Sets Refunded Money.
     *
     * @maps refunded_money
     */
    public function setRefundedMoney(V1Money $refundedMoney = null)
    {
        $this->refundedMoney = $refundedMoney;
    }

    /**
     * Returns Refunded Processing Fee Money.
     */
    public function getRefundedProcessingFeeMoney()
    {
        return $this->refundedProcessingFeeMoney;
    }

    /**
     * Sets Refunded Processing Fee Money.
     *
     * @maps refunded_processing_fee_money
     */
    public function setRefundedProcessingFeeMoney(V1Money $refundedProcessingFeeMoney = null)
    {
        $this->refundedProcessingFeeMoney = $refundedProcessingFeeMoney;
    }

    /**
     * Returns Refunded Tax Money.
     */
    public function getRefundedTaxMoney()
    {
        return $this->refundedTaxMoney;
    }

    /**
     * Sets Refunded Tax Money.
     *
     * @maps refunded_tax_money
     */
    public function setRefundedTaxMoney(V1Money $refundedTaxMoney = null)
    {
        $this->refundedTaxMoney = $refundedTaxMoney;
    }

    /**
     * Returns Refunded Additive Tax Money.
     */
    public function getRefundedAdditiveTaxMoney()
    {
        return $this->refundedAdditiveTaxMoney;
    }

    /**
     * Sets Refunded Additive Tax Money.
     *
     * @maps refunded_additive_tax_money
     */
    public function setRefundedAdditiveTaxMoney(V1Money $refundedAdditiveTaxMoney = null)
    {
        $this->refundedAdditiveTaxMoney = $refundedAdditiveTaxMoney;
    }

    /**
     * Returns Refunded Additive Tax.
     *
     * All of the additive taxes associated with the refund.
     *
     * @return V1PaymentTax[]|null
     */
    public function getRefundedAdditiveTax()
    {
        return $this->refundedAdditiveTax;
    }

    /**
     * Sets Refunded Additive Tax.
     *
     * All of the additive taxes associated with the refund.
     *
     * @maps refunded_additive_tax
     *
     * @param V1PaymentTax[]|null $refundedAdditiveTax
     */
    public function setRefundedAdditiveTax(array $refundedAdditiveTax = null)
    {
        $this->refundedAdditiveTax = $refundedAdditiveTax;
    }

    /**
     * Returns Refunded Inclusive Tax Money.
     */
    public function getRefundedInclusiveTaxMoney()
    {
        return $this->refundedInclusiveTaxMoney;
    }

    /**
     * Sets Refunded Inclusive Tax Money.
     *
     * @maps refunded_inclusive_tax_money
     */
    public function setRefundedInclusiveTaxMoney(V1Money $refundedInclusiveTaxMoney = null)
    {
        $this->refundedInclusiveTaxMoney = $refundedInclusiveTaxMoney;
    }

    /**
     * Returns Refunded Inclusive Tax.
     *
     * All of the inclusive taxes associated with the refund.
     *
     * @return V1PaymentTax[]|null
     */
    public function getRefundedInclusiveTax()
    {
        return $this->refundedInclusiveTax;
    }

    /**
     * Sets Refunded Inclusive Tax.
     *
     * All of the inclusive taxes associated with the refund.
     *
     * @maps refunded_inclusive_tax
     *
     * @param V1PaymentTax[]|null $refundedInclusiveTax
     */
    public function setRefundedInclusiveTax(array $refundedInclusiveTax = null)
    {
        $this->refundedInclusiveTax = $refundedInclusiveTax;
    }

    /**
     * Returns Refunded Tip Money.
     */
    public function getRefundedTipMoney()
    {
        return $this->refundedTipMoney;
    }

    /**
     * Sets Refunded Tip Money.
     *
     * @maps refunded_tip_money
     */
    public function setRefundedTipMoney(V1Money $refundedTipMoney = null)
    {
        $this->refundedTipMoney = $refundedTipMoney;
    }

    /**
     * Returns Refunded Discount Money.
     */
    public function getRefundedDiscountMoney()
    {
        return $this->refundedDiscountMoney;
    }

    /**
     * Sets Refunded Discount Money.
     *
     * @maps refunded_discount_money
     */
    public function setRefundedDiscountMoney(V1Money $refundedDiscountMoney = null)
    {
        $this->refundedDiscountMoney = $refundedDiscountMoney;
    }

    /**
     * Returns Refunded Surcharge Money.
     */
    public function getRefundedSurchargeMoney()
    {
        return $this->refundedSurchargeMoney;
    }

    /**
     * Sets Refunded Surcharge Money.
     *
     * @maps refunded_surcharge_money
     */
    public function setRefundedSurchargeMoney(V1Money $refundedSurchargeMoney = null)
    {
        $this->refundedSurchargeMoney = $refundedSurchargeMoney;
    }

    /**
     * Returns Refunded Surcharges.
     *
     * A list of all surcharges associated with the refund.
     *
     * @return V1PaymentSurcharge[]|null
     */
    public function getRefundedSurcharges()
    {
        return $this->refundedSurcharges;
    }

    /**
     * Sets Refunded Surcharges.
     *
     * A list of all surcharges associated with the refund.
     *
     * @maps refunded_surcharges
     *
     * @param V1PaymentSurcharge[]|null $refundedSurcharges
     */
    public function setRefundedSurcharges(array $refundedSurcharges = null)
    {
        $this->refundedSurcharges = $refundedSurcharges;
    }

    /**
     * Returns Created At.
     *
     * The time when the merchant initiated the refund for Square to process, in ISO 8601 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the merchant initiated the refund for Square to process, in ISO 8601 format.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Processed At.
     *
     * The time when Square processed the refund on behalf of the merchant, in ISO 8601 format.
     */
    public function getProcessedAt()
    {
        return $this->processedAt;
    }

    /**
     * Sets Processed At.
     *
     * The time when Square processed the refund on behalf of the merchant, in ISO 8601 format.
     *
     * @maps processed_at
     */
    public function setProcessedAt($processedAt = null)
    {
        $this->processedAt = $processedAt;
    }

    /**
     * Returns Payment Id.
     *
     * A Square-issued ID associated with the refund. For single-tender refunds, payment_id is the ID of
     * the original payment ID. For split-tender refunds, payment_id is the ID of the original tender. For
     * exchange-based refunds (is_exchange == true), payment_id is the ID of the original payment ID even
     * if the payment includes other tenders.
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     *
     * A Square-issued ID associated with the refund. For single-tender refunds, payment_id is the ID of
     * the original payment ID. For split-tender refunds, payment_id is the ID of the original tender. For
     * exchange-based refunds (is_exchange == true), payment_id is the ID of the original payment ID even
     * if the payment includes other tenders.
     *
     * @maps payment_id
     */
    public function setPaymentId($paymentId = null)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Returns Merchant Id.
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * Sets Merchant Id.
     *
     * @maps merchant_id
     */
    public function setMerchantId($merchantId = null)
    {
        $this->merchantId = $merchantId;
    }

    /**
     * Returns Is Exchange.
     *
     * Indicates whether or not the refund is associated with an exchange. If is_exchange is true, the
     * refund reflects the value of goods returned in the exchange not the total money refunded.
     */
    public function getIsExchange()
    {
        return $this->isExchange;
    }

    /**
     * Sets Is Exchange.
     *
     * Indicates whether or not the refund is associated with an exchange. If is_exchange is true, the
     * refund reflects the value of goods returned in the exchange not the total money refunded.
     *
     * @maps is_exchange
     */
    public function setIsExchange($isExchange = null)
    {
        $this->isExchange = $isExchange;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->type)) {
            $json['type']                          = $this->type;
        }
        if (isset($this->reason)) {
            $json['reason']                        = $this->reason;
        }
        if (isset($this->refundedMoney)) {
            $json['refunded_money']                = $this->refundedMoney;
        }
        if (isset($this->refundedProcessingFeeMoney)) {
            $json['refunded_processing_fee_money'] = $this->refundedProcessingFeeMoney;
        }
        if (isset($this->refundedTaxMoney)) {
            $json['refunded_tax_money']            = $this->refundedTaxMoney;
        }
        if (isset($this->refundedAdditiveTaxMoney)) {
            $json['refunded_additive_tax_money']   = $this->refundedAdditiveTaxMoney;
        }
        if (isset($this->refundedAdditiveTax)) {
            $json['refunded_additive_tax']         = $this->refundedAdditiveTax;
        }
        if (isset($this->refundedInclusiveTaxMoney)) {
            $json['refunded_inclusive_tax_money']  = $this->refundedInclusiveTaxMoney;
        }
        if (isset($this->refundedInclusiveTax)) {
            $json['refunded_inclusive_tax']        = $this->refundedInclusiveTax;
        }
        if (isset($this->refundedTipMoney)) {
            $json['refunded_tip_money']            = $this->refundedTipMoney;
        }
        if (isset($this->refundedDiscountMoney)) {
            $json['refunded_discount_money']       = $this->refundedDiscountMoney;
        }
        if (isset($this->refundedSurchargeMoney)) {
            $json['refunded_surcharge_money']      = $this->refundedSurchargeMoney;
        }
        if (isset($this->refundedSurcharges)) {
            $json['refunded_surcharges']           = $this->refundedSurcharges;
        }
        if (isset($this->createdAt)) {
            $json['created_at']                    = $this->createdAt;
        }
        if (isset($this->processedAt)) {
            $json['processed_at']                  = $this->processedAt;
        }
        if (isset($this->paymentId)) {
            $json['payment_id']                    = $this->paymentId;
        }
        if (isset($this->merchantId)) {
            $json['merchant_id']                   = $this->merchantId;
        }
        if (isset($this->isExchange)) {
            $json['is_exchange']                   = $this->isExchange;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
