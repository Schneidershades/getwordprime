<?php

namespace App\Services;

use App\Events\Subscription\PlanPaymentConfirmation;
use App\Models\Plan;
use App\Models\Transaction;

class PlanSubscriptionService
{
    private $transaction;

    public function setTransactionModel(Transaction $transaction): PlanSubscriptionService
    {
        $this->transaction = $transaction;

        return $this;
    }

    public function sendEmail()
    {
        // event(new PlanPaymentConfirmation($this->transaction));
    }

    public function processSubscriptionPlan()
    {
        // $this->transaction->user->activeTeam->team->switchTo($this->findPlan());

        // $this->sendEmail();
    }

    public function findPlan(): Plan
    {
        return Plan::find($this->transaction->transactionable_id);
    }
}
