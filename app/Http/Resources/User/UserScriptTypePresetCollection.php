<?php

namespace App\Http\Resources\User;

use App\Models\ScriptType;
use App\Models\UserScriptTypeLanguage;
use App\Models\UserScriptTypeTone;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserScriptTypePresetCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => UserScriptTypePresetResource::collection($this->collection),
            'additional_content' => [
                'script_type_tone' => $this->tone(),
                'script_type_language' => $this->language(),
            ],
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
        return [
            'script_type_allowed_tone' => $this->scriptTypeDetails()->tone ? true : false,
            'script_type_tone_question' => 'Choose a tone (Optional)',
            'tone_id' => UserScriptTypeTone::where('script_type_id', $this->collection->first()->script_type_id)
                        ->where('user_id', $this->collection->first()->user_id)
                        ->first()?->tone_id,
        ];
    }

    public function language()
    {
        return [
            'script_type_allowed_tone' => $this->scriptTypeDetails()->language ? true : false,
            'script_type_tone_question' => 'Choose a tone (Optional)',
            'language_id' => UserScriptTypeLanguage::where('script_type_id', $this->collection->first()->script_type_id)
                ->where('user_id', $this->collection->first()->user_id)
                ->first()?->language_id,
        ];
    }

    public function scriptTypeDetails()
    {
        return ScriptType::where('id', $this->collection->first()->script_type_id)->first();
    }
}
