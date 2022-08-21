<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\User;
use App\Models\ScriptResponse;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Script\FavoriteScriptResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Script\FavoriteScriptCollection;

class FavoriteScript extends Model
{
    use Uuids, HasFactory;
    
    public $oneItem = FavoriteScriptResource::class;
    public $allItems = FavoriteScriptCollection::class;

    public function scriptResponse()
    {
        return $this->belongsTo(ScriptResponse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
