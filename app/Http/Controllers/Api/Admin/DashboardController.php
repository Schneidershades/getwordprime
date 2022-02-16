<?php

namespace App\Http\Controllers\Api\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Script;
use App\Models\Transaction;
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
        $dates = [];
        
        $start = Carbon::now()->subDays(9);
        for ($i = 0; $i <= 9; $i++) {
            $day = $start->addDays(1)->format('Y-m-d');
            $dates[] = $day;
        }

        $data = [
            'user' => User::all()->count(),
            'transactions' => Transaction::all()->count(),
            'published' => Script::all()->count(),
            'xaxis' => [
                'categories' => $dates
            ],
            'data' => [0,0,0,0,0,0,0,0,0],
        ];

        return $this->showMessage($data);
    }
}
