<?php



namespace Square\Models;

/**
 * Represents a response from an update request containing the updated `WageSetting` object
 * or error messages.
 */
class UpdateWageSettingResponse implements \JsonSerializable
{
    /**
     * @var WageSetting|null
     */
    private $wageSetting;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Wage Setting.
     *
     * An object representing a team member's wage information.
     */
    public function getWageSetting()
    {
        return $this->wageSetting;
    }

    /**
     * Sets Wage Setting.
     *
     * An object representing a team member's wage information.
     *
     * @maps wage_setting
     */
    public function setWageSetting(WageSetting $wageSetting = null)
    {
        $this->wageSetting = $wageSetting;
    }

    /**
     * Returns Errors.
     *
     * The errors that occurred during the request.
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
     * The errors that occurred during the request.
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->wageSetting)) {
            $json['wage_setting'] = $this->wageSetting;
        }
        if (isset($this->errors)) {
            $json['errors']       = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
