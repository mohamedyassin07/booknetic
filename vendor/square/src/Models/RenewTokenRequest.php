<?php



namespace Square\Models;

class RenewTokenRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $accessToken;

    /**
     * Returns Access Token.
     *
     * The token you want to renew.
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Sets Access Token.
     *
     * The token you want to renew.
     *
     * @maps access_token
     */
    public function setAccessToken($accessToken = null)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->accessToken)) {
            $json['access_token'] = $this->accessToken;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
