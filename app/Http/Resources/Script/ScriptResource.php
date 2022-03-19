<?php

namespace App\Http\Resources\Script;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Script\ScriptResponseResource;

class ScriptResource extends JsonResource
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
            'content' => $this->content,
            'text' => $this->text ? $this->text : 'kindly adjust the frontend according to the new  api response then another script',
            'index' => $this->index,
            'favorite' => $this->favorite ? true : false,
            'script_type' => $this->scriptType?->name,
            'logprobs' => $this->logprobs,
            'finish_reason' => $this->finish_reason,
            'word_count' => $this->word_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
