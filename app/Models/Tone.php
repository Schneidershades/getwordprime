<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Script\ToneResource;
use App\Http\Resources\Script\ToneCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tone extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public $oneItem = ToneResource::class;
    public $allItems = ToneCollection::class;

}
