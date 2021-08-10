<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Resources\Suggestion\SuggestionResource;
use App\Http\Resources\Suggestion\SuggestionCollection;

class Suggestion extends Model
{
    use HasFactory;

    public $oneItem = SuggestionResource::class;
    public $allItems = SuggestionCollection::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function children()
    {
        return $this->hasMany(Suggestion::class, 'parent_id');
    }
}
