<?php

namespace App\Services;

class PaymentChargeService
{
    public function __construct(public $gateway, public $amount)
    {
    }

    public function gateWayChargePercentage(): float
    {
        return match ($this->gateway) {
            'Paystack' => $this->amount * 0.01,
            'Flutterwave' => $this->amount * 0.014,
            'Credo' => $this->amount * 0.014,
            default => 0
        };
    }

    public function gateWayChargeAmount(): float
    {
        return match ($this->gateway) {
            'Paystack' => 100,
            'Flutterwave' => $this->amount * 0,
            'Credo' => $this->amount * 0,
            default => 0
        };
    }

    public function finalChargeAmount(): float
    {
        return $this->amount + ($this->gateWayChargePercentage() + $this->gateWayChargeAmount());
    }
}
