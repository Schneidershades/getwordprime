<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Freelancer\FreelancerAdResource;
use App\Http\Resources\Freelancer\FreelancerAdCollection;

class FreelancerAd extends Model
{
    use HasFactory;

    public $oneItem = FreelancerAdResource::class;
    public $allItems = FreelancerAdCollection::class;
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
