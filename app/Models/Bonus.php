<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Bonus\BonusResource;
use App\Http\Resources\Bonus\BonusCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bonus extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public $oneItem = BonusResource::class;
    public $allItems = BonusCollection::class;
}
