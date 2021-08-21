<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ScriptType;

class ScriptTypeOpenaiAttributes extends Model
{
    use HasFactory;

    public function scriptType()
    {
        return $this->belongsTo(ScriptType::class);
    }
}
