<?php

namespace App\Models;

use App\Http\Resources\Agency\AgencyCollection;
use App\Http\Resources\Agency\AgencyResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = AgencyResource::class;

    public $allItems = AgencyCollection::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'agency_campaigns');
    }
}
