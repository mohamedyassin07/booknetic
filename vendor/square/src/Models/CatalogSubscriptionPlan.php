<?php



namespace Square\Models;

/**
 * Describes a subscription plan. For more information, see
 * [Set Up and Manage a Subscription Plan](https://developer.squareup.com/docs/subscriptions-api/setup-
 * plan).
 */
class CatalogSubscriptionPlan implements \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var SubscriptionPhase[]
     */
    private $phases;

    /**
     * @param $name
     * @param SubscriptionPhase[] $phases
     */
    public function __construct($name, array $phases)
    {
        $this->name = $name;
        $this->phases = $phases;
    }

    /**
     * Returns Name.
     *
     * The name of the plan.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the plan.
     *
     * @required
     * @maps name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns Phases.
     *
     * A list of SubscriptionPhase containing the [SubscriptionPhase]($m/SubscriptionPhase) for this plan.
     *
     * @return SubscriptionPhase[]
     */
    public function getPhases()
    {
        return $this->phases;
    }

    /**
     * Sets Phases.
     *
     * A list of SubscriptionPhase containing the [SubscriptionPhase]($m/SubscriptionPhase) for this plan.
     *
     * @required
     * @maps phases
     *
     * @param SubscriptionPhase[] $phases
     */
    public function setPhases(array $phases)
    {
        $this->phases = $phases;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['name']   = $this->name;
        $json['phases'] = $this->phases;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
