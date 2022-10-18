<?php

namespace App\Models;

use App\Http\Resources\AgencyFile\AgencyFileCollection;
use App\Http\Resources\AgencyFile\AgencyFileResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyFile extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = AgencyFileResource::class;

    public $allItems = AgencyFileCollection::class;
}
