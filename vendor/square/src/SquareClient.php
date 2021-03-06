<?php



namespace Square;

use Square\Apis;

/**
 * Square client class
 */
class SquareClient implements ConfigurationInterface
{
    private $mobileAuthorization;
    private $oAuth;
    private $v1Employees;
    private $v1Transactions;
    private $applePay;
    private $bankAccounts;
    private $bookings;
    private $cards;
    private $cashDrawers;
    private $catalog;
    private $customers;
    private $customerGroups;
    private $customerSegments;
    private $devices;
    private $disputes;
    private $employees;
    private $giftCards;
    private $giftCardActivities;
    private $inventory;
    private $invoices;
    private $labor;
    private $locations;
    private $checkout;
    private $transactions;
    private $loyalty;
    private $merchants;
    private $orders;
    private $payments;
    private $refunds;
    private $sites;
    private $snippets;
    private $subscriptions;
    private $team;
    private $terminal;

    private $timeout = ConfigurationDefaults::TIMEOUT;
    private $squareVersion = ConfigurationDefaults::SQUARE_VERSION;
    private $additionalHeaders = ConfigurationDefaults::ADDITIONAL_HEADERS;
    private $environment = ConfigurationDefaults::ENVIRONMENT;
    private $customUrl = ConfigurationDefaults::CUSTOM_URL;
    private $accessToken = ConfigurationDefaults::ACCESS_TOKEN;
    private $accessTokenManager;
    private $authManagers = [];
    private $httpCallback;

    public function __construct(array $configOptions = null)
    {
        if (isset($configOptions['timeout'])) {
            $this->timeout = $configOptions['timeout'];
        }
        if (isset($configOptions['squareVersion'])) {
            $this->squareVersion = $configOptions['squareVersion'];
        }
        if (isset($configOptions['additionalHeaders'])) {
            $this->additionalHeaders = $configOptions['additionalHeaders'];
            \Square\ApiHelper::assertHeaders($this->additionalHeaders);
        }
        if (isset($configOptions['environment'])) {
            $this->environment = $configOptions['environment'];
        }
        if (isset($configOptions['customUrl'])) {
            $this->customUrl = $configOptions['customUrl'];
        }
        if (isset($configOptions['accessToken'])) {
            $this->accessToken = $configOptions['accessToken'];
        }
        if (isset($configOptions['httpCallback'])) {
            $this->httpCallback = $configOptions['httpCallback'];
        }

        $this->accessTokenManager = new AccessTokenManager($this->accessToken);
        $this->authManagers['global'] = $this->accessTokenManager;
    }

    /**
     * Get the client configuration as an associative array
     */
    public function getConfiguration()
    {
        $configMap = [];

        if (isset($this->timeout)) {
            $configMap['timeout'] = $this->timeout;
        }
        if (isset($this->squareVersion)) {
            $configMap['squareVersion'] = $this->squareVersion;
        }
        if (isset($this->additionalHeaders)) {
            $configMap['additionalHeaders'] = $this->additionalHeaders;
        }
        if (isset($this->environment)) {
            $configMap['environment'] = $this->environment;
        }
        if (isset($this->customUrl)) {
            $configMap['customUrl'] = $this->customUrl;
        }
        if (isset($this->accessToken)) {
            $configMap['accessToken'] = $this->accessToken;
        }
        if (isset($this->httpCallback)) {
            $configMap['httpCallback'] = $this->httpCallback;
        }

        return $configMap;
    }

    /**
     * Clone this client and override given configuration options
     */
    public function withConfiguration(array $configOptions)
    {
        return new self(\array_merge($this->getConfiguration(), $configOptions));
    }

    public function getTimeout()
    {
        return $this->timeout;
    }

    public function getSquareVersion()
    {
        return $this->squareVersion;
    }

    public function getAdditionalHeaders()
    {
        return $this->additionalHeaders;
    }

    public function getEnvironment()
    {
        return $this->environment;
    }

    public function getCustomUrl()
    {
        return $this->customUrl;
    }

    public function getAccessTokenCredentials()
    {
        if (isset($this->accessTokenManager)) {
            return clone $this->accessTokenManager;
        } else {
            return null;
        }
    }

    /**
     * Get current SDK version
     */
    public function getSdkVersion()
    {
        return '13.0.0.20210721';
    }


    /**
     * Get the base uri for a given server in the current environment
     *
     * @param  $server Server name
     *
     * @return string         Base URI
     */
    public function getBaseUri($server = Server::DEFAULT_)
    {
        return ApiHelper::appendUrlWithTemplateParameters(
            static::ENVIRONMENT_MAP[$this->environment][$server],
            [
                'custom_url' => $this->customUrl,
            ],
            false
        );
    }

    /**
     * Returns Mobile Authorization Api
     */
    public function getMobileAuthorizationApi()
    {
        if ($this->mobileAuthorization == null) {
            $this->mobileAuthorization = new Apis\MobileAuthorizationApi(
                $this,
                $this->authManagers,
                $this->httpCallback
            );
        }
        return $this->mobileAuthorization;
    }

    /**
     * Returns O Auth Api
     */
    public function getOAuthApi()
    {
        if ($this->oAuth == null) {
            $this->oAuth = new Apis\OAuthApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->oAuth;
    }

    /**
     * Returns V1 Employees Api
     */
    public function getV1EmployeesApi()
    {
        if ($this->v1Employees == null) {
            $this->v1Employees = new Apis\V1EmployeesApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->v1Employees;
    }

    /**
     * Returns V1 Transactions Api
     */
    public function getV1TransactionsApi()
    {
        if ($this->v1Transactions == null) {
            $this->v1Transactions = new Apis\V1TransactionsApi(
                $this,
                $this->authManagers,
                $this->httpCallback
            );
        }
        return $this->v1Transactions;
    }

    /**
     * Returns Apple Pay Api
     */
    public function getApplePayApi()
    {
        if ($this->applePay == null) {
            $this->applePay = new Apis\ApplePayApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->applePay;
    }

    /**
     * Returns Bank Accounts Api
     */
    public function getBankAccountsApi()
    {
        if ($this->bankAccounts == null) {
            $this->bankAccounts = new Apis\BankAccountsApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->bankAccounts;
    }

    /**
     * Returns Bookings Api
     */
    public function getBookingsApi()
    {
        if ($this->bookings == null) {
            $this->bookings = new Apis\BookingsApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->bookings;
    }

    /**
     * Returns Cards Api
     */
    public function getCardsApi()
    {
        if ($this->cards == null) {
            $this->cards = new Apis\CardsApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->cards;
    }

    /**
     * Returns Cash Drawers Api
     */
    public function getCashDrawersApi()
    {
        if ($this->cashDrawers == null) {
            $this->cashDrawers = new Apis\CashDrawersApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->cashDrawers;
    }

    /**
     * Returns Catalog Api
     */
    public function getCatalogApi()
    {
        if ($this->catalog == null) {
            $this->catalog = new Apis\CatalogApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->catalog;
    }

    /**
     * Returns Customers Api
     */
    public function getCustomersApi()
    {
        if ($this->customers == null) {
            $this->customers = new Apis\CustomersApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->customers;
    }

    /**
     * Returns Customer Groups Api
     */
    public function getCustomerGroupsApi()
    {
        if ($this->customerGroups == null) {
            $this->customerGroups = new Apis\CustomerGroupsApi(
                $this,
                $this->authManagers,
                $this->httpCallback
            );
        }
        return $this->customerGroups;
    }

    /**
     * Returns Customer Segments Api
     */
    public function getCustomerSegmentsApi()
    {
        if ($this->customerSegments == null) {
            $this->customerSegments = new Apis\CustomerSegmentsApi(
                $this,
                $this->authManagers,
                $this->httpCallback
            );
        }
        return $this->customerSegments;
    }

    /**
     * Returns Devices Api
     */
    public function getDevicesApi()
    {
        if ($this->devices == null) {
            $this->devices = new Apis\DevicesApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->devices;
    }

    /**
     * Returns Disputes Api
     */
    public function getDisputesApi()
    {
        if ($this->disputes == null) {
            $this->disputes = new Apis\DisputesApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->disputes;
    }

    /**
     * Returns Employees Api
     */
    public function getEmployeesApi()
    {
        if ($this->employees == null) {
            $this->employees = new Apis\EmployeesApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->employees;
    }

    /**
     * Returns Gift Cards Api
     */
    public function getGiftCardsApi()
    {
        if ($this->giftCards == null) {
            $this->giftCards = new Apis\GiftCardsApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->giftCards;
    }

    /**
     * Returns Gift Card Activities Api
     */
    public function getGiftCardActivitiesApi()
    {
        if ($this->giftCardActivities == null) {
            $this->giftCardActivities = new Apis\GiftCardActivitiesApi(
                $this,
                $this->authManagers,
                $this->httpCallback
            );
        }
        return $this->giftCardActivities;
    }

    /**
     * Returns Inventory Api
     */
    public function getInventoryApi()
    {
        if ($this->inventory == null) {
            $this->inventory = new Apis\InventoryApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->inventory;
    }

    /**
     * Returns Invoices Api
     */
    public function getInvoicesApi()
    {
        if ($this->invoices == null) {
            $this->invoices = new Apis\InvoicesApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->invoices;
    }

    /**
     * Returns Labor Api
     */
    public function getLaborApi()
    {
        if ($this->labor == null) {
            $this->labor = new Apis\LaborApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->labor;
    }

    /**
     * Returns Locations Api
     */
    public function getLocationsApi()
    {
        if ($this->locations == null) {
            $this->locations = new Apis\LocationsApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->locations;
    }

    /**
     * Returns Checkout Api
     */
    public function getCheckoutApi()
    {
        if ($this->checkout == null) {
            $this->checkout = new Apis\CheckoutApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->checkout;
    }

    /**
     * Returns Transactions Api
     */
    public function getTransactionsApi()
    {
        if ($this->transactions == null) {
            $this->transactions = new Apis\TransactionsApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->transactions;
    }

    /**
     * Returns Loyalty Api
     */
    public function getLoyaltyApi()
    {
        if ($this->loyalty == null) {
            $this->loyalty = new Apis\LoyaltyApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->loyalty;
    }

    /**
     * Returns Merchants Api
     */
    public function getMerchantsApi()
    {
        if ($this->merchants == null) {
            $this->merchants = new Apis\MerchantsApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->merchants;
    }

    /**
     * Returns Orders Api
     */
    public function getOrdersApi()
    {
        if ($this->orders == null) {
            $this->orders = new Apis\OrdersApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->orders;
    }

    /**
     * Returns Payments Api
     */
    public function getPaymentsApi()
    {
        if ($this->payments == null) {
            $this->payments = new Apis\PaymentsApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->payments;
    }

    /**
     * Returns Refunds Api
     */
    public function getRefundsApi()
    {
        if ($this->refunds == null) {
            $this->refunds = new Apis\RefundsApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->refunds;
    }

    /**
     * Returns Sites Api
     */
    public function getSitesApi()
    {
        if ($this->sites == null) {
            $this->sites = new Apis\SitesApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->sites;
    }

    /**
     * Returns Snippets Api
     */
    public function getSnippetsApi()
    {
        if ($this->snippets == null) {
            $this->snippets = new Apis\SnippetsApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->snippets;
    }

    /**
     * Returns Subscriptions Api
     */
    public function getSubscriptionsApi()
    {
        if ($this->subscriptions == null) {
            $this->subscriptions = new Apis\SubscriptionsApi(
                $this,
                $this->authManagers,
                $this->httpCallback
            );
        }
        return $this->subscriptions;
    }

    /**
     * Returns Team Api
     */
    public function getTeamApi()
    {
        if ($this->team == null) {
            $this->team = new Apis\TeamApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->team;
    }

    /**
     * Returns Terminal Api
     */
    public function getTerminalApi()
    {
        if ($this->terminal == null) {
            $this->terminal = new Apis\TerminalApi($this, $this->authManagers, $this->httpCallback);
        }
        return $this->terminal;
    }

    /**
     * A map of all baseurls used in different environments and servers
     *
     * @var array
     */
    const ENVIRONMENT_MAP = [
        Environment::PRODUCTION => [
            Server::DEFAULT_ => 'https://connect.squareup.com',
        ],
        Environment::SANDBOX => [
            Server::DEFAULT_ => 'https://connect.squareupsandbox.com',
        ],
        Environment::CUSTOM => [
            Server::DEFAULT_ => '{custom_url}',
        ],
    ];
}
