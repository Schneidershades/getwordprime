<?php

namespace App\Models;

use App\Http\Resources\Script\ScriptTypePresetCollection;
use App\Http\Resources\Script\ScriptTypePresetResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
