<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceProject extends Model
{
    use Uuids, HasFactory;

    public $oneItem = MarketplaceProjectResource::class;
    public $allItems = MarketplaceProjectCollection::class;
}
