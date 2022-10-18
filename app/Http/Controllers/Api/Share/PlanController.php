<?php

namespace App\Http\Controllers\Api\Share;

use App\Http\Controllers\Controller;
use App\Models\Plan;

class PlanController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/share/plans",
     *      operationId="allSharedPlans",
     *      tags={"shared"},
     *      summary="Get all plans",
     *      description="Get all plans",
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
        return $this->showAll(Plan::all());
    }
}
