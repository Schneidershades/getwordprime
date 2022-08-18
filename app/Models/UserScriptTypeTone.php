<?php

namespace App\Models;

use App\Models\Tone;
use App\Models\User;
use App\Models\ScriptType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserScriptTypeTone extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scriptType()
    {
        return $this->belongsTo(ScriptType::class);
    }

    public function tone()
    {
        return $this->belongsTo(Tone::class);
    }
}
