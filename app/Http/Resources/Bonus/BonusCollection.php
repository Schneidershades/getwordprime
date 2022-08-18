<?php

namespace App\Http\Resources\Bonus;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BonusCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }



    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'name' => 'name',
            'description' => 'description',
            'url' => 'url',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'name' => 'name',
            'description' => 'description',
            'url' => 'url',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
