<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Platform\ThirdPartyPlatformResource;
use App\Http\Resources\Platform\ThirdPartyPlatformCollection;

class ThirdPartyPlatform extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = ThirdPartyPlatformResource::class;
    public $allItems = ThirdPartyPlatformCollection::class;
}
