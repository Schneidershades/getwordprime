<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use LucasDotVin\Soulbscription\Models\Feature as SoulFeature;

class Feature extends SoulFeature
{
    use Uuids, HasFactory;

    public $oneItem = FeatureResource::class;

    public $allItems = FeatureCollection::class;
}
