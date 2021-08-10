<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Script\ScriptTypeResource;
use App\Http\Resources\Script\ScriptTypeCollection;

class ScriptType extends Model
{
    use HasFactory;

    public $oneItem = ScriptTypeResource::class;
    public $allItems = ScriptTypeCollection::class;
}
