<?php

namespace App\Http\Resources\Suggestion;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SuggestionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'message' => 'message',
            'user_id' => 'user_id',
            'parent_id' => 'parent_id',
            'status' => 'status',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
     {
         $attribute = [
             'id' => 'id',
             'message' => 'message',
             'user_id' => 'user_id',
             'parent_id' => 'parent_id',
             'status' => 'status',
         ];

         return isset($attribute[$index]) ? $attribute[$index] : null;
     }
}
