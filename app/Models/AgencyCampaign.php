<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\Agency;
use App\Models\Campaign;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Agency\AgencyCampaignResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Agency\AgencyCampaignCollection;

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
