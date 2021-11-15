<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Plan\PlanResource;
use App\Http\Resources\Plan\PlanCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;
    public $oneItem = PlanResource::class;
    public $allItems = PlanCollection::class;
}
