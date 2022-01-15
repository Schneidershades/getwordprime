<?php

namespace App\Models;

use App\Models\ScriptResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FlaggedScript extends Model
{
    use HasFactory;

    public function scriptResponse()
    {
        return $this->belongsTo(ScriptResponse::class);
    }
}
