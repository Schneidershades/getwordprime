<?php

namespace App\Models;

use App\Http\Resources\Campaign\CampaignCollection;
use App\Http\Resources\Campaign\CampaignResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
