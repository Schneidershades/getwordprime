<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FavoriteScriptCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => FavoriteScriptResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'user_id' => 'user_id',
            'script_response_id' => 'script_response_id',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
     {
         $attribute = [
             'user_id' => 'user_id',
             'script_response_id' => 'script_response_id',
         ];

         return isset($attribute[$index]) ? $attribute[$index] : null;
     }
}
