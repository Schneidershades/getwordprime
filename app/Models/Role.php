<?php

namespace App\Models;

use App\Http\Resources\Role\RoleCollection;
use App\Http\Resources\Role\RoleResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use Uuids, HasFactory;

    public $oneItem = RoleResource::class;

    public $allItems = RoleCollection::class;
}
