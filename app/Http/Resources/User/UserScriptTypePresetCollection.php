<?php

namespace App\Http\Resources\User;

use App\Models\UserScriptTypeTone;
use App\Models\UserScriptTypeLanguage;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\User\UserScriptTypeToneResource;
use App\Http\Resources\User\UserScriptTypePresetResource;
use App\Http\Resources\User\UserScriptTypeLanguageResource;
use App\Models\ScriptType;

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
        // if($this->scriptTypeDetails() && $this->collection->first()->user_id){
        //     $tone = UserScriptTypeTone::where('script_type_id', $this->collection->first()->script_type_id)
        //                 ->where('user_id', $this->collection->first()->user_id)
        //                 ->first();

        //     return new UserScriptTypeToneResource($tone);
        // }else{
            return [
                "script_type_allowed_tone" => $this->scriptTypeDetails()->tone ? true : false,
                "script_type_tone_question" => 'Choose a tone (Optional)',
                "tone" => UserScriptTypeTone::where('script_type_id', $this->collection->first()->script_type_id)
                            ->where('user_id', $this->collection->first()->user_id)
                            ->first()?->tone_id,
            ];
        // }
        
    }

    public function language()
    {
        // if($this->scriptTypeDetails() && $this->collection->first()->user_id){
        //     $language = UserScriptTypeLanguage::where('script_type_id', $this->collection->first()->script_type_id)
        //             ->where('user_id', $this->collection->first()->user_id)
        //             ->first();

        //     return new UserScriptTypeLanguageResource($language);
        // }else{
            return [
                "script_type_allowed_tone" => $this->scriptTypeDetails()->language ? true : false,
                "script_type_tone_question" => 'Choose a tone (Optional)',
                "language" => UserScriptTypeLanguage::where('script_type_id', $this->collection->first()->script_type_id)
                    ->where('user_id', $this->collection->first()->user_id)
                    ->first()?->language_id,
            ];
        // }
        
    }

    public function scriptTypeDetails()
    {
        return ScriptType::where('id', $this->collection->first()->script_type_id)->first();
    }
}
