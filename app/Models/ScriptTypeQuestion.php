<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Script\ScriptTypeQuestionResource;
use App\Http\Resources\Script\ScriptTypeQuestionCollection;

class ScriptTypeQuestion extends Model
{
    use HasFactory;

    public $oneItem = ScriptTypeQuestionResource::class;
    public $allItems = ScriptTypeQuestionCollection::class;
}
