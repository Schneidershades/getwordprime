<?php

namespace App\Http\Resources\Attribute;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AttributeCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => AttributeResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'name' => 'name',
            'type' => 'type',
            'default_value' => 'default_value',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
     {
         $attribute = [
             'id' => 'id',
             'name' => 'name',
             'type' => 'type',
             'default_value' => 'default_value',
         ];

         return isset($attribute[$index]) ? $attribute[$index] : null;
     }
}
