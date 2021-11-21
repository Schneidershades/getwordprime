<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdPartyPlatform extends Model
{
    use HasFactory;

    public $oneItem = ThirdPartyPlatformResource::class;
    public $allItems = ThirdPartyPlatformCollection::class;
}