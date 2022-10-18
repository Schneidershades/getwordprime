<?php

namespace App\Models;

use App\Http\Resources\Script\FlaggedScriptCollection;
use App\Http\Resources\Script\FlaggedScriptResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlaggedScript extends Model
{
    use Uuids, HasFactory;

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
