<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\ScriptType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Script\ScriptTypeCategoryResource;
use App\Http\Resources\Script\ScriptTypeCategoryCollection;

class ScriptTypeCategory extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = ScriptTypeCategoryResource::class;
    public $allItems = ScriptTypeCategoryCollection::class;

    public function scripts()
    {
        return $this->hasMany(ScriptType::class);
    }
}
