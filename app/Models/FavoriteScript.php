<?php

namespace App\Models;

use App\Models\ScriptResponse;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Script\FavoriteScriptResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Script\FavoriteScriptCollection;

class FavoriteScript extends Model
{
    use HasFactory;
    
    public $oneItem = FavoriteScriptResource::class;
    public $allItems = FavoriteScriptCollection::class;

    public function scriptResponse()
    {
        return $this->belongsTo(ScriptResponse::class);
    }
}
