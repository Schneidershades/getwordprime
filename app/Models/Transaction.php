<?php

namespace App\Models;

use App\Http\Resources\Transaction\TransactionCollection;
use App\Http\Resources\Transaction\TransactionResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = TransactionResource::class;

    public $allItems = TransactionCollection::class;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
