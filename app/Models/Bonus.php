<?php

namespace App\Models;

use App\Http\Resources\Bonus\BonusCollection;
use App\Http\Resources\Bonus\BonusResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = BonusResource::class;

    public $allItems = BonusCollection::class;
}
