<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\JsonResource;

class ScriptTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => $this->icon->file_url,
            'prompt_1' => $this->prompt_1,
            'prompt_2' => $this->prompt_2,
            'description' => $this->description,
            'usage' => $this->usage,
            'presence_penalty' => $this->presence_penalty,
            'temperature' => $this->temperature,
            'engine' => $this->engine,
            'frequency_penalty' => $this->frequency_penalty,
            'best_of' => $this->best_of,
            'presets' => ScriptTypePresetResource::collection($this->presets),
            'stream' => $this->stream,
            'documents' => $this->documents,
            'query' => $this->query,
            'max_tokens' => $this->max_tokens,
            'top_p' => $this->top_p,
            'activate' => $this->activate ? true : false,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
