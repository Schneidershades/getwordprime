<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\User;
use App\Models\Agency;
use App\Models\Script;
use App\Models\ScriptResponse;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Campaign\CampaignResource;
use App\Http\Resources\Campaign\CampaignCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use Uuids, HasFactory;

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

    public function scriptResponses()
    {
        return $this->hasMany(ScriptResponse::class);
    }

    public function agencies()
    {
    	return $this->belongsToMany(Agency::class, 'agency_campaigns');
    }
}
