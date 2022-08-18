<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\Plan\PlanResource;
use App\Http\Resources\Plan\PlanCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use LucasDotVin\Soulbscription\Models\Plan as SoulPlan;

class Plan extends SoulPlan
{
    use Uuids, HasFactory;

    public $oneItem = PlanResource::class;
    public $allItems = PlanCollection::class;

    public function scopeTeams(Builder $builder)
    {
        return $builder->where('teams', true);
    }

    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}
