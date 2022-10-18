<?php

namespace App\Models;

use App\Http\Resources\Script\ScriptCollection;
use App\Http\Resources\Script\ScriptResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = ScriptResource::class;

    public $allItems = ScriptCollection::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scriptType()
    {
        return $this->belongsTo(ScriptType::class);
    }

    public function scriptResponses()
    {
        return $this->hasMany(ScriptResponse::class);
    }
}
