<?php

namespace App\Models;

use App\Http\Resources\Suggestion\SuggestionCollection;
use App\Http\Resources\Suggestion\SuggestionResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

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
