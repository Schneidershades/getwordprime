<?php

namespace App\Models;

use App\Models\ScriptType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Script\ScriptTypePromptResource;
use App\Http\Resources\Script\ScriptTypePromptCollection;

class ScriptTypePrompt extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public $oneItem = ScriptTypePromptResource::class;
    public $allItems = ScriptTypePromptCollection::class;

    public function scriptType()
    {
        return $this->belongsTo(ScriptType::class);
    }
}
