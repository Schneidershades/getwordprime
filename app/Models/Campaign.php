<?php

namespace App\Models;

use App\Models\User;
use App\Models\Agency;
use App\Models\Script;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Campaign\CampaignResource;
use App\Http\Resources\Campaign\CampaignCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $oneItem = CampaignResource::class;
    public $allItems = CampaignCollection::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scripts()
    {
        return $this->hasMany(Script::class);
    }

    public function agencies()
    {
    	return $this->belongsToMany(Agency::class, 'agency_campaigns');
    }
}
