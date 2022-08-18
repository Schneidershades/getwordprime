<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\AgencyFile\AgencyFileResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\AgencyFile\AgencyFileCollection;

class AgencyFile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $oneItem = AgencyFileResource::class;
    public $allItems = AgencyFileCollection::class;
}
