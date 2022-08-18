<?php

namespace App\Models;

use App\Models\Script;
use App\Models\FlaggedScript;
use App\Models\FavoriteScript;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Script\ScriptResponseResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Script\ScriptResponseCollection;

class ScriptResponse extends Model
{
    use HasFactory;
    
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
