<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Script\ScriptTypeCategoryResource;
use App\Http\Resources\Script\ScriptTypeCategoryCollection;

class ScriptTypeCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $oneItem = ScriptTypeCategoryResource::class;
    public $allItems = ScriptTypeCategoryCollection::class;
}
