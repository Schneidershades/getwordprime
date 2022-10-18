<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TransactionCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'transactionId' => 'transactionId',
            'plan_id' => 'plan_id',
            'user_id' => 'user_id',
            'activate' => 'activate',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
     {
         $attribute = [
             'id' => 'id',
             'transactionId' => 'transactionId',
             'plan_id' => 'plan_id',
             'user_id' => 'user_id',
             'activate' => 'activate',
         ];

         return isset($attribute[$index]) ? $attribute[$index] : null;
     }
}
