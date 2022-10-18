<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ScriptCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => ScriptResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'user_id' => 'user_id',
            'script_type_id' => 'script_type_id',
            'campaign_id' => 'campaign_id',
            'content' => 'content',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
     {
         $attribute = [
             'id' => 'id',
             'user_id' => 'user_id',
             'script_type_id' => 'script_type_id',
             'campaign_id' => 'campaign_id',
             'content' => 'content',
         ];

         return isset($attribute[$index]) ? $attribute[$index] : null;
     }
}
