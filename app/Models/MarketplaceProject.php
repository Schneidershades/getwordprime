<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceProject extends Model
{
    use HasFactory;

    public $oneItem = MarketplaceProjectResource::class;
    public $allItems = MarketplaceProjectCollection::class;
}
