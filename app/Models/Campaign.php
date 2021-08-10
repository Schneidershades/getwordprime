<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Resources\Campaign\CampaignResource;
use App\Http\Resources\Campaign\CampaignCollection;

class Campaign extends Model
{
    use HasFactory;

    public $oneItem = CampaignResource::class;
    public $allItems = CampaignCollection::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
