<?php



namespace Square\Models;

/**
 * A parent Catalog Object model represents a set of Quick Amounts and the settings control the
 * amounts.
 */
class CatalogQuickAmountsSettings implements \JsonSerializable
{
    /**
     * @var string
     */
    private $option;

    /**
     * @var bool|null
     */
    private $eligibleForAutoAmounts;

    /**
     * @var CatalogQuickAmount[]|null
     */
    private $amounts;

    /**
     * @param $option
     */
    public function __construct($option)
    {
        $this->option = $option;
    }

    /**
     * Returns Option.
     *
     * Determines a seller's option on Quick Amounts feature.
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * Sets Option.
     *
     * Determines a seller's option on Quick Amounts feature.
     *
     * @required
     * @maps option
     */
    public function setOption($option)
    {
        $this->option = $option;
    }

    /**
     * Returns Eligible for Auto Amounts.
     *
     * Represents location's eligibility for auto amounts
     * The boolean should be consistent with whether there are AUTO amounts in the `amounts`.
     */
    public function getEligibleForAutoAmounts()
    {
        return $this->eligibleForAutoAmounts;
    }

    /**
     * Sets Eligible for Auto Amounts.
     *
     * Represents location's eligibility for auto amounts
     * The boolean should be consistent with whether there are AUTO amounts in the `amounts`.
     *
     * @maps eligible_for_auto_amounts
     */
    public function setEligibleForAutoAmounts($eligibleForAutoAmounts = null)
    {
        $this->eligibleForAutoAmounts = $eligibleForAutoAmounts;
    }

    /**
     * Returns Amounts.
     *
     * Represents a set of Quick Amounts at this location.
     *
     * @return CatalogQuickAmount[]|null
     */
    public function getAmounts()
    {
        return $this->amounts;
    }

    /**
     * Sets Amounts.
     *
     * Represents a set of Quick Amounts at this location.
     *
     * @maps amounts
     *
     * @param CatalogQuickAmount[]|null $amounts
     */
    public function setAmounts(array $amounts = null)
    {
        $this->amounts = $amounts;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['option']                        = $this->option;
        if (isset($this->eligibleForAutoAmounts)) {
            $json['eligible_for_auto_amounts'] = $this->eligibleForAutoAmounts;
        }
        if (isset($this->amounts)) {
            $json['amounts']                   = $this->amounts;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
