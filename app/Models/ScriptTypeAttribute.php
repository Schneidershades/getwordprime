<?php

namespace App\Models;

use App\Http\Resources\Script\ScriptTypeAttributeCollection;
use App\Http\Resources\Script\ScriptTypeAttributeResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptTypeAttribute extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = ScriptTypeAttributeResource::class;

    public $allItems = ScriptTypeAttributeCollection::class;

    public function scriptType()
    {
        return $this->belongsTo(ScriptType::class);
    }
}
