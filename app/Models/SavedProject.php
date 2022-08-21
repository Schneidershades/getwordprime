<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\FreelancerAd;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Freelancer\SavedProjectResource;
use App\Http\Resources\Freelancer\SavedProjectCollection;

class SavedProject extends Model
{
    use Uuids, HasFactory;

    public $oneItem = SavedProjectResource::class;
    public $allItems = SavedProjectCollection::class;

    protected $guarded = [];

    public function freelanceAd()
    {
        return $this->belongsTo(FreelancerAd::class, 'freelancer_ad_id');
    }
}
