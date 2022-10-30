<?php

namespace App\Models;

use App\Http\Resources\Payment\PaymentGatewayListCollection;
use App\Http\Resources\Payment\PaymentGatewayListResource;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGatewayList extends Model
{
    use Uuids, HasFactory;

    protected $guarded = [];

    public $oneItem = PaymentGatewayListResource::class;

    public $allItems = PaymentGatewayListCollection::class;

    public function gateways()
    {
        return $this->hasMany(PaymentGateway::class);
    }
}
