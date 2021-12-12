<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
    * @OA\Get(
    *      path="/api/v1/dashboard",
    *      operationId="userDashboard",
    *      tags={"user"},
    *      summary="userDashboard",
    *      description="userDashboard",
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
        $data = [
            'campaigns' => auth()->user()->campaigns->count(),
            'scripts' => auth()->user()->scripts->count(),
            'published' => auth()->user()->scripts->count(),
        ];

        return $this->showMessage($data);
    }
}
