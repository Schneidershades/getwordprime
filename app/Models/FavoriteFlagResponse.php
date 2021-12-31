<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Script\ScriptFavoriteFlagResource;
use App\Http\Resources\Script\ScriptFavoriteFlagCollection;

class FavoriteFlagResponse extends Model
{
    use HasFactory;

    public $oneItem = ScriptFavoriteFlagResource::class;
    public $allItems = ScriptFavoriteFlagCollection::class;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

