<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\ScriptType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Script\ScriptTypePresetResource;
use App\Http\Resources\Script\ScriptTypePresetCollection;

class ScriptTypePreset extends Model
{
    use Uuids, HasFactory;
    
    protected $guarded = [];

    public $oneItem = ScriptTypePresetResource::class;
    public $allItems = ScriptTypePresetCollection::class;

    public function scriptType()
    {
        return $this->belongsTo(ScriptType::class);
    }
}
