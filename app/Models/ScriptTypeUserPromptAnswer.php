<?php

namespace App\Models;

use App\Models\User;
use App\Models\ScriptTypePrompt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Script\ScriptTypeUserPromptAnswerResource;
use App\Http\Resources\Script\ScriptTypeUserPromptAnswerCollection;

class ScriptTypeUserPromptAnswer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $oneItem = ScriptTypeUserPromptAnswerResource::class;
    public $allItems = ScriptTypeUserPromptAnswerCollection::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scriptType()
    {
        return $this->belongsTo(ScriptTypePrompt::class);
    }
}
