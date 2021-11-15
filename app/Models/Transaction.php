<?php

namespace App\Models;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Plan\PlanResource;
use App\Http\Resources\Plan\PlanCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    public $oneItem = PlanResource::class;
    public $allItems = PlanCollection::class;

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
            $order->receipt_number = 'XR-'. substr(str_shuffle("0123456789"), 0, 6);
        });
    }
}
