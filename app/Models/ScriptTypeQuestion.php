<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Script\ScriptTypeQuestionResource;
use App\Http\Resources\Script\ScriptTypeQuestionCollection;
use App\Models\ScriptType;

class ScriptTypeQuestion extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $oneItem = ScriptTypeQuestionResource::class;
    public $allItems = ScriptTypeQuestionCollection::class;

    public function scriptType()
    {
        return $this->belongsTo(ScriptType::class);
    }
}
