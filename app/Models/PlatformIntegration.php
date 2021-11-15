<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Platform\PlatformIntegrationResource;
use App\Http\Resources\Platform\PlatformIntegrationCollection;

class PlatformIntegration extends Model
{
    use HasFactory;
    
    public $oneItem = PlatformIntegrationResource::class;
    public $allItems = PlatformIntegrationCollection::class;
}
