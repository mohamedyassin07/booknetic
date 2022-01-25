<?php



namespace Square\Models;

/**
 * A whole number or unreduced fractional ratio.
 */
class QuantityRatio implements \JsonSerializable
{
    /**
     * @var int|null
     */
    private $quantity;

    /**
     * @var int|null
     */
    private $quantityDenominator;

    /**
     * Returns Quantity.
     *
     * The whole or fractional quantity as the numerator.
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets Quantity.
     *
     * The whole or fractional quantity as the numerator.
     *
     * @maps quantity
     */
    public function setQuantity($quantity = null)
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns Quantity Denominator.
     *
     * The whole or fractional quantity as the denominator.
     * In the case of fractional quantity this field is the denominator and quantity is the numerator.
     * When unspecified, the value is `1`. For example, when `quantity=3` and `quantity_donominator` is
     * unspecified,
     * the quantity ratio is `3` or `3/1`.
     */
    public function getQuantityDenominator()
    {
        return $this->quantityDenominator;
    }

    /**
     * Sets Quantity Denominator.
     *
     * The whole or fractional quantity as the denominator.
     * In the case of fractional quantity this field is the denominator and quantity is the numerator.
     * When unspecified, the value is `1`. For example, when `quantity=3` and `quantity_donominator` is
     * unspecified,
     * the quantity ratio is `3` or `3/1`.
     *
     * @maps quantity_denominator
     */
    public function setQuantityDenominator($quantityDenominator = null)
    {
        $this->quantityDenominator = $quantityDenominator;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->quantity)) {
            $json['quantity']             = $this->quantity;
        }
        if (isset($this->quantityDenominator)) {
            $json['quantity_denominator'] = $this->quantityDenominator;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
