<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptTypePrompt extends Model
{
    use HasFactory;

    public $oneItem = ScriptTypePromptResource::class;
    public $allItems = ScriptTypePromptCollection::class;

    public function scriptType()
    {
        return $this->belongsTo(ScriptType::class);
    }
}
