<?php

namespace App\Http\Resources\Freelancer;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FreelancerAdCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'project_id' => 'project_id',
            'title' => 'title',
            'type' => 'type',
            'short_description' => 'short_description',
            'full_description' => 'full_description',
            'date' => 'date',
            'bids' => 'bids',
            'status' => 'status',
            'bid_count' => 'bid_count',
            'bid_avg' => 'bid_avg',
            'budget_type' => 'budget_type',
            'budget_low' => 'budget_low',
            'budget_high' => 'budget_high',
            'url' => 'url',
            'currency_id' => 'currency_id',
            'currency_code' => 'currency_code',
            'currency_sign' => 'currency_sign',
            'currency_name' => 'currency_name',
            'currency_exchange_rate' => 'currency_exchange_rate',
            'currency_country' => 'currency_country',
            'currency_is_escrowcom_supported' => 'currency_is_escrowcom_supported',
            'hourly_commitment' => 'hourly_commitment',
            'hourly_interval' => 'hourly_interval',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
    {
        $attribute = [
            'project_id' => 'project_id',
            'title' => 'title',
            'type' => 'type',
            'short_description' => 'short_description',
            'full_description' => 'full_description',
            'date' => 'date',
            'bids' => 'bids',
            'status' => 'status',
            'bid_count' => 'bid_count',
            'bid_avg' => 'bid_avg',
            'budget_type' => 'budget_type',
            'budget_low' => 'budget_low',
            'budget_high' => 'budget_high',
            'url' => 'url',
            'currency_id' => 'currency_id',
            'currency_code' => 'currency_code',
            'currency_sign' => 'currency_sign',
            'currency_name' => 'currency_name',
            'currency_exchange_rate' => 'currency_exchange_rate',
            'currency_country' => 'currency_country',
            'currency_is_escrowcom_supported' => 'currency_is_escrowcom_supported',
            'hourly_commitment' => 'hourly_commitment',
            'hourly_interval' => 'hourly_interval',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
