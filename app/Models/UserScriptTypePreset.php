<?php

namespace App\Models;

use App\Models\ScriptType;
use App\Models\ScriptTypePreset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\User\UserScriptTypePresetResource;
use App\Http\Resources\User\UserScriptTypePresetCollection;

class UserScriptTypePreset extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $oneItem = UserScriptTypePresetResource::class;
    public $allItems = UserScriptTypePresetCollection::class;


    public function scriptTypePreset()
    {
        return $this->belongsTo(ScriptTypePreset::class);
    }

    public function scriptType()
    {
        return $this->belongsTo(ScriptType::class);
    }
}
