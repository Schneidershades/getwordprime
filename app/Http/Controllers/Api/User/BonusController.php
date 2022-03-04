<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Bonus;
use App\Http\Controllers\Controller;

class BonusController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/bonuses",
    *      operationId="userBonus",
    *      tags={"user"},
    *      summary="Get all bonuses",
    *      description="Get all bonuses",
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
    public function index()
    {
        $search_query = request()->get('search') ? request()->get('search') : null;

        $bonuses =  Bonus::query()
                ->selectRaw('bonuses.*')
                ->when($search_query, function (Builder $builder, $search_query) {
                    $builder->where('bonuses.name', 'LIKE', "%{$search_query}%")
                    ->where('bonuses.description', 'LIKE', "%{$search_query}%")
                    ->where('bonuses.url', 'LIKE', "%{$search_query}%");
                })->latest()->get();

        return $this->showAll($bonuses);
    }
}
