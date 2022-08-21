<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Script\LanguageResource;
use App\Http\Resources\Script\LanguageCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = LanguageResource::class;
    public $allItems = LanguageCollection::class;
}
