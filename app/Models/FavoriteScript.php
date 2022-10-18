<?php

namespace App\Models;

use App\Http\Resources\Script\FavoriteScriptCollection;
use App\Http\Resources\Script\FavoriteScriptResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
