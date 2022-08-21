<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermissions;
use App\Http\Resources\Permission\PermissionResource;
use App\Http\Resources\Permission\PermissionCollection;

class Permission extends SpatiePermissions
{
	use Uuids, HasFactory;

    public $oneItem = PermissionResource::class;
    public $allItems = PermissionCollection::class;

	public static function defaultPermissions()
	{
	    return [
	        'create_users',
	        'edit_users',
	        'show_users',
	        'delete_users',

	        'create_agencyCampaign',
	        'edit_agencyCampaign',
	        'show_agencyCampaign',
	        'delete_agencyCampaign',

	        'create_attributes',
	        'edit_attributes',
	        'show_attributes',
	        'delete_attributes',

	        'create_bonuses',
	        'edit_bonuses',
	        'show_bonuses',
	        'delete_bonuses',

	        'create_campaigns',
	        'edit_campaigns',
	        'show_campaigns',
	        'delete_campaigns',

	        'create_openaiAttributes',
	        'edit_openaiAttributes',
	        'show_openaiAttributes',
	        'delete_openaiAttributes',
	    ];
	}
}
