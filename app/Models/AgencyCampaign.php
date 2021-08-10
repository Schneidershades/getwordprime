<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Agency\AgencyCampaignResource;
use App\Http\Resources\Agency\AgencyCampaignCollection;

class AgencyCampaign extends Model
{
    use HasFactory;

    public $oneItem = AgencyCampaignResource::class;
    public $allItems = AgencyCampaignCollection::class;
}
