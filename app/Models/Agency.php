<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Resources\Agency\AgencyResource;
use App\Http\Resources\Agency\AgencyCollection;

class Agency extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $oneItem = AgencyResource::class;
    public $allItems = AgencyCollection::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'agency_campaigns');
    }
}
