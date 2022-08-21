<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\User;
use App\Models\Campaign;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Agency\AgencyResource;
use App\Http\Resources\Agency\AgencyCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
