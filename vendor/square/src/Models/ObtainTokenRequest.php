<?php



namespace Square\Models;

class ObtainTokenRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $redirectUri;

    /**
     * @var string
     */
    private $grantType;

    /**
     * @var string|null
     */
    private $refreshToken;

    /**
     * @var string|null
     */
    private $migrationToken;

    /**
     * @var string[]|null
     */
    private $scopes;

    /**
     * @var bool|null
     */
    private $shortLived;

    /**
     * @param $clientId
     * @param $clientSecret
     * @param $grantType
     */
    public function __construct($clientId, $clientSecret, $grantType)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->grantType = $grantType;
    }

    /**
     * Returns Client Id.
     *
     * The Square-issued ID of your application, available from the
     * [developer dashboard](https://developer.squareup.com/apps).
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Sets Client Id.
     *
     * The Square-issued ID of your application, available from the
     * [developer dashboard](https://developer.squareup.com/apps).
     *
     * @required
     * @maps client_id
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    /**
     * Returns Client Secret.
     *
     * The Square-issued application secret for your application, available
     * from the [developer dashboard](https://developer.squareup.com/apps).
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * Sets Client Secret.
     *
     * The Square-issued application secret for your application, available
     * from the [developer dashboard](https://developer.squareup.com/apps).
     *
     * @required
     * @maps client_secret
     */
    public function setClientSecret($clientSecret)
    {
        $this->clientSecret = $clientSecret;
    }

    /**
     * Returns Code.
     *
     * The authorization code to exchange.
     * This is required if `grant_type` is set to `authorization_code`, to indicate that
     * the application wants to exchange an authorization code for an OAuth access token.
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets Code.
     *
     * The authorization code to exchange.
     * This is required if `grant_type` is set to `authorization_code`, to indicate that
     * the application wants to exchange an authorization code for an OAuth access token.
     *
     * @maps code
     */
    public function setCode($code = null)
    {
        $this->code = $code;
    }

    /**
     * Returns Redirect Uri.
     *
     * The redirect URL assigned in the [developer dashboard](https://developer.squareup.com/apps).
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * Sets Redirect Uri.
     *
     * The redirect URL assigned in the [developer dashboard](https://developer.squareup.com/apps).
     *
     * @maps redirect_uri
     */
    public function setRedirectUri($redirectUri = null)
    {
        $this->redirectUri = $redirectUri;
    }

    /**
     * Returns Grant Type.
     *
     * Specifies the method to request an OAuth access token.
     * Valid values are: `authorization_code`, `refresh_token`, and `migration_token`
     */
    public function getGrantType()
    {
        return $this->grantType;
    }

    /**
     * Sets Grant Type.
     *
     * Specifies the method to request an OAuth access token.
     * Valid values are: `authorization_code`, `refresh_token`, and `migration_token`
     *
     * @required
     * @maps grant_type
     */
    public function setGrantType($grantType)
    {
        $this->grantType = $grantType;
    }

    /**
     * Returns Refresh Token.
     *
     * A valid refresh token for generating a new OAuth access token.
     * A valid refresh token is required if `grant_type` is set to `refresh_token` , to indicate the
     * application wants a replacement for an expired OAuth access token.
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * Sets Refresh Token.
     *
     * A valid refresh token for generating a new OAuth access token.
     * A valid refresh token is required if `grant_type` is set to `refresh_token` , to indicate the
     * application wants a replacement for an expired OAuth access token.
     *
     * @maps refresh_token
     */
    public function setRefreshToken($refreshToken = null)
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * Returns Migration Token.
     *
     * Legacy OAuth access token obtained using a Connect API version prior
     * to 2019-03-13. This parameter is required if `grant_type` is set to
     * `migration_token` to indicate that the application wants to get a replacement
     * OAuth access token. The response also returns a refresh token.
     * For more information, see [Migrate to Using Refresh Tokens](https://developer.squareup.
     * com/docs/oauth-api/migrate-to-refresh-tokens).
     */
    public function getMigrationToken()
    {
        return $this->migrationToken;
    }

    /**
     * Sets Migration Token.
     *
     * Legacy OAuth access token obtained using a Connect API version prior
     * to 2019-03-13. This parameter is required if `grant_type` is set to
     * `migration_token` to indicate that the application wants to get a replacement
     * OAuth access token. The response also returns a refresh token.
     * For more information, see [Migrate to Using Refresh Tokens](https://developer.squareup.
     * com/docs/oauth-api/migrate-to-refresh-tokens).
     *
     * @maps migration_token
     */
    public function setMigrationToken($migrationToken = null)
    {
        $this->migrationToken = $migrationToken;
    }

    /**
     * Returns Scopes.
     *
     * A JSON list of strings representing the permissions the application is requesting.
     * For example: "`["MERCHANT_PROFILE_READ","PAYMENTS_READ","BANK_ACCOUNTS_READ"]`"
     * The access token returned in the response is granted the permissions
     * that comprise the intersection between the requested list of permissions, and those
     * that belong to the provided refresh token.
     *
     * @return string[]|null
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * Sets Scopes.
     *
     * A JSON list of strings representing the permissions the application is requesting.
     * For example: "`["MERCHANT_PROFILE_READ","PAYMENTS_READ","BANK_ACCOUNTS_READ"]`"
     * The access token returned in the response is granted the permissions
     * that comprise the intersection between the requested list of permissions, and those
     * that belong to the provided refresh token.
     *
     * @maps scopes
     *
     * @param string[]|null $scopes
     */
    public function setScopes(array $scopes = null)
    {
        $this->scopes = $scopes;
    }

    /**
     * Returns Short Lived.
     *
     * A boolean indicating a request for a short-lived access token.
     * The short-lived access token returned in the response will expire in 24 hours.
     */
    public function getShortLived()
    {
        return $this->shortLived;
    }

    /**
     * Sets Short Lived.
     *
     * A boolean indicating a request for a short-lived access token.
     * The short-lived access token returned in the response will expire in 24 hours.
     *
     * @maps short_lived
     */
    public function setShortLived($shortLived = null)
    {
        $this->shortLived = $shortLived;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['client_id']           = $this->clientId;
        $json['client_secret']       = $this->clientSecret;
        if (isset($this->code)) {
            $json['code']            = $this->code;
        }
        if (isset($this->redirectUri)) {
            $json['redirect_uri']    = $this->redirectUri;
        }
        $json['grant_type']          = $this->grantType;
        if (isset($this->refreshToken)) {
            $json['refresh_token']   = $this->refreshToken;
        }
        if (isset($this->migrationToken)) {
            $json['migration_token'] = $this->migrationToken;
        }
        if (isset($this->scopes)) {
            $json['scopes']          = $this->scopes;
        }
        if (isset($this->shortLived)) {
            $json['short_lived']     = $this->shortLived;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
