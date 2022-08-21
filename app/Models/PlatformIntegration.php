<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Platform\PlatformIntegrationResource;
use App\Http\Resources\Platform\PlatformIntegrationCollection;

class PlatformIntegration extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];
    
    public $oneItem = PlatformIntegrationResource::class;
    public $allItems = PlatformIntegrationCollection::class;
}
