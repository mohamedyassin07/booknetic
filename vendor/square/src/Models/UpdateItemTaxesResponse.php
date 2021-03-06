<?php



namespace Square\Models;

class UpdateItemTaxesResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var string|null
     */
    private $updatedAt;

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
     * Returns Updated At.
     *
     * The database [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates) of
     * this update in RFC 3339 format, e.g., `2016-09-04T23:59:33.123Z`.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The database [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates) of
     * this update in RFC 3339 format, e.g., `2016-09-04T23:59:33.123Z`.
     *
     * @maps updated_at
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
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
            $json['errors']     = $this->errors;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at'] = $this->updatedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
