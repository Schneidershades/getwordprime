<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Script\ScriptTypePresetResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserScriptTypePresetResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'question' => new ScriptTypePresetResource($this->scriptTypePreset),
            'answer' => $this->answers,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
