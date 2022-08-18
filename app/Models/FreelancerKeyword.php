<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Freelancer\FreelancerKeywordResource;
use App\Http\Resources\Freelancer\FreelancerKeywordCollection;

class FreelancerKeyword extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $oneItem = FreelancerKeywordResource::class;
    public $allItems = FreelancerKeywordCollection::class;
}
