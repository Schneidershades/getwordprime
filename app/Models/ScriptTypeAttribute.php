<?php

namespace App\Models;

use App\Models\ScriptType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Script\ScriptTypeAttributeResource;
use App\Http\Resources\Script\ScriptTypeAttributeCollection;

class ScriptTypeAttribute extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public $oneItem = ScriptTypeAttributeResource::class;
    public $allItems = ScriptTypeAttributeCollection::class;

    public function scriptType()
    {
        return $this->belongsTo(ScriptType::class);
    }
}
