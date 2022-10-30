<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;

class SubscriptionController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/subscription-plans",
     *      operationId="subPlans",
     *      tags={"Plans"},
     *      summary="All plans",
     *      description="All plans",
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
     *          description="Unauthenticated",
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
        $plans = Plan::where('periodicity_type', 'Month')
                    ->where('type', 'Subscription')
                    ->where('amount', '>', 0);

        return $this->showAll($plans);
    }
}
