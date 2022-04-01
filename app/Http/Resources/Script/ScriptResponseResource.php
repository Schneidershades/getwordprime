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
            'script_type_name' => $this->script_type_name,
            'word_count' => $this->word_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
