<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Resources\Script\ScriptUserAnswerResource;
use App\Http\Resources\Script\ScriptUserAnswerCollection;

class ScriptUserAnswer extends Model
{
    use HasFactory;

    public $oneItem = ScriptUserAnswerResource::class;
    public $allItems = ScriptUserAnswerCollection::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
