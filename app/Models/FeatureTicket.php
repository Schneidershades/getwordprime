<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use LucasDotVin\Soulbscription\Models\FeatureTicket as SoulFeatureTicket;

class FeatureTicket extends SoulFeatureTicket
{
    use Uuids, HasFactory;
}
