<?php

namespace App\Models;

use App\Models\Script;
use App\Models\FlaggedScript;
use App\Models\FavoriteScript;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScriptResponse extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function favorite()
    {
        return $this->hasOne(FavoriteScript::class);
    }

    public function script()
    {
        return $this->hasOne(Script::class);
    }

    public function flagged()
    {
        return $this->hasOne(FlaggedScript::class);
    }
}
