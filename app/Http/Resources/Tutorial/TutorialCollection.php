<?php

namespace App\Http\Resources\Tutorial;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TutorialCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => TutorialResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'title' => 'title',
            'description' => 'description',
            'link' => 'link',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
     {
         $attribute = [
             'id' => 'id',
             'title' => 'title',
             'description' => 'description',
             'link' => 'link',
         ];

         return isset($attribute[$index]) ? $attribute[$index] : null;
     }
}
