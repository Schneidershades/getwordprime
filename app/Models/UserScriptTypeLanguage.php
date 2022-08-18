<?php

namespace App\Models;

use App\Models\User;
use App\Models\Language;
use App\Models\ScriptType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserScriptTypeLanguage extends Model
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

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
