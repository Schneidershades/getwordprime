<?php

namespace App\Models;

use App\Http\Resources\Agency\AgencyCampaignCollection;
use App\Http\Resources\Agency\AgencyCampaignResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyCampaign extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = AgencyCampaignResource::class;

    public $allItems = AgencyCampaignCollection::class;

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
