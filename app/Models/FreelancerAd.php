<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Market\MarketResource;
use App\Http\Resources\Market\MarketCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FreelancerAd extends Model
{
    use HasFactory;

    public $oneItem = MarketResource::class;
    public $allItems = MarketCollection::class;
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
