<?php

namespace App\Models;

use App\Http\Resources\Script\ScriptTypeCategoryCollection;
use App\Http\Resources\Script\ScriptTypeCategoryResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptTypeCategory extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = ScriptTypeCategoryResource::class;

    public $allItems = ScriptTypeCategoryCollection::class;

    public function scriptTypes()
    {
        return $this->hasMany(ScriptType::class);
    }
}
