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
            'icon' => $this->icon,
            'description' => $this->description,
            'usage' => $this->usage,
            'presence_penalty' => $this->presence_penalty,
            'frequency_penalty' => $this->frequency_penalty,
            'best_of' => $this->best_of,
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


$table->string('usage')->nullable();
$table->string('presence_penalty')->nullable();
$table->string('frequency_penalty')->nullable();
$table->string('best_of')->nullable();
$table->string('stream')->nullable();
$table->string('documents')->nullable();
$table->string('query')->nullable();
$table->string('max_tokens')->nullable();
$table->string('temperature')->nullable();
$table->string('top_p')->nullable();