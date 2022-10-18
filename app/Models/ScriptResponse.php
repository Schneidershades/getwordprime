<?php

namespace App\Models;

use App\Http\Resources\Script\ScriptResponseCollection;
use App\Http\Resources\Script\ScriptResponseResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScriptResponse extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = ScriptResponseResource::class;

    public $allItems = ScriptResponseCollection::class;

    public function favorite()
    {
        return $this->hasOne(FavoriteScript::class);
    }

    public function script()
    {
        return $this->belongsTo(Script::class);
    }

    public function flagged()
    {
        return $this->hasOne(FlaggedScript::class);
    }
}
