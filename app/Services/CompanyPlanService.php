<?php

namespace App\Services;

use App\Models\Plan;
use App\Traits\Api\ApiResponder;

class CompanyPlanService
{
    use ApiResponder;

    public function findUserPlan($user)
    {
        return $user->is_business && $user->company->subscription ? $user->company->subscription->plan->id : Plan::where('name', 'Basic')->first();
    }

    public function companySubscriptionDate($user)
    {
        return [$user->subscription->subscription_date, $user->subscription->expiry_date];
    }

    public function documentWithinASubscriptionPeriod($user)
    {
        return $user->company->document->whereBetween('created_at', [$this->companySubscriptionDate($user)])->get();
    }

    public function getPlanFeatures($user)
    {
        return $this->findUserPlan($user) ? $this->findUserPlan($user)->features : null;
    }

    public function canAddUserBusiness($user)
    {
        $user->company->teams->count() < $this->findUserPlan($user)->where('model_type', 'User')->first()->value ? true : false;
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
}
