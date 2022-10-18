<?php

namespace App\Models;

use App\Http\Resources\Script\ScriptTypeCollection;
use App\Http\Resources\Script\ScriptTypeResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptType extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = ScriptTypeResource::class;

    public $allItems = ScriptTypeCollection::class;

    public function presets()
    {
        return $this->hasMany(ScriptTypePreset::class)->orderBy('id', 'ASC');
    }

    public function iconImage()
    {
        return $this->morphOne(Media::class, 'fileable')->latest();
    }

    public function scriptResponses()
    {
        return $this->hasMany(ScriptResponse::class);
    }
}
