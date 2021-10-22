<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Attribute\AttributeResource;
use App\Http\Resources\Attribute\AttributeCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;

    public $oneItem = AttributeResource::class;
    public $allItems = AttributeCollection::class;
}
