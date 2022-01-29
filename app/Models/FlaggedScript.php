<?php

namespace App\Models;

use App\Models\User;
use App\Models\ScriptResponse;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Script\FlaggedScriptResource;
use App\Http\Resources\Script\FlaggedScriptCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FlaggedScript extends Model
{
    use HasFactory;
    
    public $oneItem = FlaggedScriptResource::class;
    public $allItems = FlaggedScriptCollection::class;

    public function scriptResponse()
    {
        return $this->belongsTo(ScriptResponse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
