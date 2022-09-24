<?php

namespace App\Services;

use App\Events\Subscription\PaymentConfirmation;
use App\Models\ScheduleSession;
use App\Models\Transaction;

class ScheduleSessionService
{
    private $transaction;

    public function setTransactionModel(Transaction $transaction): ScheduleSessionService
    {
        $this->transaction = $transaction;

        return $this;
    }

    public function sendEmail()
    {
        event(new PaymentConfirmation($this->transaction));
    }

    public function processScheduleSession()
    {
        return $this->sendEmail();
    }

    public function findScheduleSession(): ScheduleSession
    {
        return ScheduleSession::find($this->transaction->transactionable_id);
    }

    public function find($id){
        return ScheduleSession::where('id', $id)
                                    ->first();
    }
}
