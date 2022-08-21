<?php

namespace App\Models;

use App\Traits\Uuids;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Transaction\TransactionResource;
use App\Http\Resources\Transaction\TransactionCollection;

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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->transaction_id = 'XR-'. substr(str_shuffle("0123456789"), 0, 6);
        });
    }
}
