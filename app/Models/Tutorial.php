<?php

namespace App\Models;

use App\Http\Resources\Tutorial\TutorialCollection;
use App\Http\Resources\Tutorial\TutorialResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = TutorialResource::class;

    public $allItems = TutorialCollection::class;
}
