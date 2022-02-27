<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserScriptTypeLanguageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "script_type_allowed_language" => $this->scriptType->language ? true : false,
            "script_type_language_question" => 'Change output language (Optional)',
            "language" => $this->language,
        ];
    }
}
