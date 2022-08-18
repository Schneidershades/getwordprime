<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LucasDotVin\Soulbscription\Models\FeaturePlan as SoulFeaturePlan;

class FeaturePlan extends SoulFeaturePlan
{
    use Uuids, HasFactory;

    protected $table = 'feature_plan';
}
