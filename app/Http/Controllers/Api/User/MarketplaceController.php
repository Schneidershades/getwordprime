<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Traits\Plugins\FreelancerApi;
use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/marketplace",
    *      operationId="userMarketplace",
    *      tags={"user"},
    *      summary="userMarketplace",
    *      description="userMarketplace",
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
        $freelancer = new FreelancerApi;        
        
        return $freelancer->projects();

        // return $freelancer->contentWritingJobs();
    }
}
