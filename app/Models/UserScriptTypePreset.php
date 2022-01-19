<?php

namespace App\Models;

use App\Http\Resources\User\UserScriptTypePresetCollection;
use App\Http\Resources\User\UserScriptTypePresetResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
