<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Script;
use App\Models\Campaign;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
     /**
    * @OA\Get(
    *      path="/api/v1/admin/dashboard",
    *      operationId="adminDashboard",
    *      tags={"Admin"},
    *      summary="adminDashboard",
    *      description="adminDashboard",
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
            'campaigns' => Campaign::all()->count(),
            'scripts' => Script::all()->count(),
            'published' => Script::all()->count(),
        ];

        return $this->showMessage($data);
    }
}
