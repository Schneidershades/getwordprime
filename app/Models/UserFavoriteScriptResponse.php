<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteScriptResponse extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public $oneItem = UserFavoriteScriptResponseResource::class;
    public $allItems = UserFavoriteScriptResponseCollection::class;

    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function script()
    {
        return $this->belongTo(Script::class);
    }
}
