<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Plan\PlanResource;
use App\Http\Resources\Plan\PlanCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public $oneItem = PlanResource::class;
    public $allItems = PlanCollection::class;

    public function users()
    {
    	return $this->belongsToMany(User::class, 'user_plans');
    }
}
