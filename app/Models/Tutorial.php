<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Tutorial\TutorialResource;
use App\Http\Resources\Tutorial\TutorialCollection;

class Tutorial extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $oneItem = TutorialResource::class;
    public $allItems = TutorialCollection::class;
}
