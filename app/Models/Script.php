<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Resources\Script\ScriptResource;
use App\Http\Resources\Script\ScriptCollection;

class Script extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public $oneItem = ScriptResource::class;
    public $allItems = ScriptCollection::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    } 

    public function scriptResponses()
    {
        return $this->hasMany(ScriptResponse::class);
    }
}
