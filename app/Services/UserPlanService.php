<?php

namespace App\Services;

use App\Events\Subscription\TrialPlanEvent;
use App\Models\Plan;
use App\Traits\Api\ApiResponder;

class UserPlanService
{
    use ApiResponder;

    public function findUserPlan($user)
    {
        return $user->is_business && $user->subscription ? $user->subscription->plan->id : Plan::where('name', 'Basic')->first();
    }

    public function companySubscriptionDate($user)
    {
        return [$user->subscription->subscription_date, $user->subscription->expiry_date];
    }

    public function documentWithinASubscriptionPeriod($user)
    {
        return $user->document->whereBetween('created_at', [$this->companySubscriptionDate($user)])->get();
    }

    public function getPlanFeatures($user)
    {
        return $this->findUserPlan($user) ? $this->findUserPlan($user)->features : null;
    }

    public function canAddUserBusiness($user)
    {
        $user->teams->count() < $this->findUserPlan($user)->where('model_type', 'User')->first()->value ? true : false;
    }

    public function canAddDocument($user)
    {
        $this->documentWithinASubscriptionPeriod($user)->count() < $this->findUserPlan($user)->where('model_type', 'Document')->first()->value ? true : false;
    }

    public function canAddAuditTrail($user)
    {
        return $this->findUserPlan($user)->where('model_type', 'Audit Trail')->first() ? true : false;
    }

    public function canDSSS($user)
    {
        return $this->findUserPlan($user)->where('model_type', 'DSSS')->first() ? true : false;
    }

    public function checkPlanUnderATeam($user)
    {
        $hasSubscriptionPlan = $user->subscription->plan->name ?? null;

        $user->teams->where('user_id', $user->id);
    }

    public function checkPlan($user)
    {
        $subscriptionPlan = $user->subscription->plan->name ?? null;

        if ($subscriptionPlan === null) {
            return redirect()->route('admin.tasks.index')->with('status', 'You have no active plan.');
        }
    }

    public function isTrialPlan($user)
    {
        return $user->team?->subscription?->plan?->trial === true;
    }

    public function sendEmail($user)
    {
        // ($this->isTrialPlan($user)) ? event(new TrialPlanEvent($user)) : null;
    }
}
