<?php

namespace App\Models;

use App\Http\Resources\Script\ToneCollection;
use App\Http\Resources\Script\ToneResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tone extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = ToneResource::class;

    public $allItems = ToneCollection::class;
}
