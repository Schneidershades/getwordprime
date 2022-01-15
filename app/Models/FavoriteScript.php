<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteScript extends Model
{
    use HasFactory;

    public function scriptResponse()
    {
        return $this->belongsTo(ScriptResponse::class);
    }
}
