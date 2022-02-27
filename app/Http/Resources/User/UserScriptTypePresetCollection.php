<?php

namespace App\Http\Resources\User;

use App\Models\UserScriptTypeTone;
use App\Models\UserScriptTypeLanguage;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\User\UserScriptTypeToneResource;
use App\Http\Resources\User\UserScriptTypePresetResource;
use App\Http\Resources\User\UserScriptTypeLanguageResource;

class UserScriptTypePresetCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => UserScriptTypePresetResource::collection($this->collection),
            'additional_content' => [
                'script_type_tone' => $this->tone(),
                'script_type_language' => $this->language(),
            ]
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'answer' => 'answer',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'answer' => 'answer',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

    public function tone()
    {
        if($this->collection->first()->script_type_id && $this->collection->first()->user_id){
            $tone = UserScriptTypeTone::where('script_type_id', $this->collection->first()->script_type_id)
            ->where('script_type_id', $this->collection->first()->user_id)
            ->first();

            return new UserScriptTypeToneResource($tone);
        }
        
    }

    public function language()
    {
        if($this->collection->first()->script_type_id && $this->collection->first()->user_id){
            $tone = UserScriptTypeLanguage::where('script_type_id', $this->collection->first()->script_type_id)
            ->where('script_type_id', $this->collection->first()->user_id)
            ->first();

            return new UserScriptTypeLanguageResource($tone);
        }
        
    }
}
