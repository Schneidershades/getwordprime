<?php

namespace App\Models\Location;

use App\Http\Resources\Location\StateCollection;
use App\Http\Resources\Location\StateResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use Uuids, HasFactory;

    public $oneItem = StateResource::class;

    public $allItems = StateCollection::class;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
