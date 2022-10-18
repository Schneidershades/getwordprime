<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => UserResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'name' => 'name',
            'email' => 'email',
            'role' => 'role',
            'parent_id' => 'parent_id',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
     {
         $attribute = [
             'name' => 'name',
             'email' => 'email',
             'role' => 'role',
             'parent_id' => 'parent_id',
         ];

         return isset($attribute[$index]) ? $attribute[$index] : null;
     }
}
