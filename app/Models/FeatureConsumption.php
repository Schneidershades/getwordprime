<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use LucasDotVin\Soulbscription\Models\FeatureConsumption as SoulFeatureConsumption;

class FeatureConsumption extends SoulFeatureConsumption
{
    use Uuids, HasFactory;

    protected $guarded = [];
}
