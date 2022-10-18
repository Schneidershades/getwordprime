<?php

namespace App\Models;

use App\Http\Resources\Script\LanguageCollection;
use App\Http\Resources\Script\LanguageResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = LanguageResource::class;

    public $allItems = LanguageCollection::class;
}
