<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\JsonResource;

class ScriptResponseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'script_content' => $this->script_content,
            'script_type_name' => $this->findScriptType(),
            'favorite' => $this->favorite ? true : false,
            'word_count' => $this->word_count,
            'campaign_id' => $this->campaign_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public function findScriptType()
    {
        if ($this->script_type_name == null) {
            return $this->script?->scriptType?->name;
        }

        return $this->script_type_name;
    }
}
