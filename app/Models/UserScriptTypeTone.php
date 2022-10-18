<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserScriptTypeTone extends Model
{
    use Uuids, HasFactory;

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
