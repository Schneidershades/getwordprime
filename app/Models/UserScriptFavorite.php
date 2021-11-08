<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Script;
use App\Http\Resources\User\UserScriptFavoriteResource;
use App\Http\Resources\User\UserScriptFavoriteCollection;

class UserScriptFavorite extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $oneItem = UserScriptFavoriteResource::class;
    public $allItems = UserScriptFavoriteCollection::class;

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function script()
    {
        return $this->belongTo(Script::class);
    }
}
