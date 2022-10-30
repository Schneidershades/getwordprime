<?php

namespace App\Http\Resources\Transaction;

use App\Http\Resources\User\UserNameResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'status' => $this->status,
            'amount_paid' => $this->amount_paid,
            'total' => $this->total,
            'payment_methods' => $this->pending(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public function pending()
    {
        $paymentGateways = [];

        $gateways = PaymentGateway::with('paymentGatewayList', 'country')->where('country_id', Country::where('name', 'Nigeria')->first()->id)->where('active', true)->get();

        foreach ($gateways as $gateway) {
            $paymentGateways[] = [
                'id' => $gateway->id,
                'name' => $gateway->paymentGatewayList?->name,
                'file' => $gateway->paymentGatewayList?->file,
                'total' => (new PaymentChargeService($gateway->paymentGatewayList?->name, $this->total))->finalChargeAmount(),
            ];
        }

        return $paymentGateways;
    }

    public function ifSchneider()
    {
        $this->user->email == "baxibox247@gmail.com" ? 50 : $this->total;
    }
}
