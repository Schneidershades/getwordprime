<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Script;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;

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
            'user' => User::all()->count(),
            'transactions' => Transaction::all()->count(),
            'published' => Script::all()->count(),
            'dates' => [
                '03-02-2022', 
                '04-02-2022', 
                '05-02-2022', 
                '06-02-2022', 
                '07-02-2022', 
                '09-02-2022', 
                '10-02-2022', 
                '11-02-2022', 
                '12-02-2022'
            ],
            'data' => [0,0,0,0,0,0,0,0,0],
        ];

        return $this->showMessage($data);
    }
}
