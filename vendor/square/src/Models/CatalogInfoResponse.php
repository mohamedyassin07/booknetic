<?php



namespace Square\Models;

class CatalogInfoResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var CatalogInfoResponseLimits|null
     */
    private $limits;

    /**
     * @var StandardUnitDescriptionGroup|null
     */
    private $standardUnitDescriptionGroup;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(array $errors = null)
    {
        $this->errors = $errors;
    }

    /**
     * Returns Limits.
     */
    public function getLimits()
    {
        return $this->limits;
    }

    /**
     * Sets Limits.
     *
     * @maps limits
     */
    public function setLimits(CatalogInfoResponseLimits $limits = null)
    {
        $this->limits = $limits;
    }

    /**
     * Returns Standard Unit Description Group.
     *
     * Group of standard measurement units.
     */
    public function getStandardUnitDescriptionGroup()
    {
        return $this->standardUnitDescriptionGroup;
    }

    /**
     * Sets Standard Unit Description Group.
     *
     * Group of standard measurement units.
     *
     * @maps standard_unit_description_group
     */
    public function setStandardUnitDescriptionGroup(StandardUnitDescriptionGroup $standardUnitDescriptionGroup = null)
    {
        $this->standardUnitDescriptionGroup = $standardUnitDescriptionGroup;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors']                          = $this->errors;
        }
        if (isset($this->limits)) {
            $json['limits']                          = $this->limits;
        }
        if (isset($this->standardUnitDescriptionGroup)) {
            $json['standard_unit_description_group'] = $this->standardUnitDescriptionGroup;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
