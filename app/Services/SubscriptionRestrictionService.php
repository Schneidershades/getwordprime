<?php

namespace App\Services;

use App\Models\Feature;
use App\Models\FeatureConsumption;
use ErrorException;

class SubscriptionRestrictionService
{
    public function checkRestrictions($feature, $type)
    {
        $subscriptionPlan = auth('api')->user()?->activeTeam?->team?->subscription?->plan?->name ?? null;

        if ($subscriptionPlan === null) {
            return new \ErrorException('You have no active plan.');
        }

        $feature = match ($subscriptionPlan) {
            'Basic', 'Pro', 'Business' => $feature,
        };

        if (auth('api')->user()->activeTeam->team->cantConsume($feature, 1)) {
            $message = match ($subscriptionPlan) {
                'Basic', 'Pro', 'Business' => "You have reached the maximum amount of $type under this plan. Please kindly upgrade",
            };

            throw new ErrorException($message);
        }
    }

    public function consumeFeature($feature)
    {
        auth('api')->user()->activeTeam->team->consume($feature, 1);
    }

    public function consumeFeatureCreate($team, $feature)
    {
        $feature = Feature::where('name', $feature)->first() ? Feature::where('name', $feature)->first() : null;

        $consume = new FeatureConsumption;
        $consume->feature_id = $feature->id;
        $consume->consumption = 1;
        $consume->expired_at = $team?->subscription?->expired_at;
        $consume->subscriber_id = $team?->id;
        $consume->subscriber_type = 'Team';
        $consume->save();

        return $consume;
    }

    public function giveFeatureTicket($total)
    {
        auth('api')->user()->activeTeam->team->giveTicketFor('Notary Pack Feature', today()->addYear(), $total);
    }
}
