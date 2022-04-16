<?php

namespace App\Http\Controllers\Api\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Script;
use App\Models\Transaction;
use App\Models\ScriptResponse;
use Illuminate\Support\Facades\DB;
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

        $dateTime = ScriptResponse::where('created_at', '>=', Carbon::now()->subDays(9))
                ->groupBy('date')
                ->orderBy('date', 'DESC')
                ->get([
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as "words"')
        ])->pluck('date')->toArray();

        $dateCount = ScriptResponse::where('created_at', '>=', Carbon::now()->subDays(9))
                ->groupBy('date')
                ->orderBy('date', 'DESC')
                ->get([
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as "words"')
        ])->pluck('words')->toArray();

        // return ($productsByDay);

        // ScriptResponse::distinct()
        //           ->select(DB::raw('count(*) as total ') , DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_date '), DB::raw('DAYNAME(created_at) as dia'))
        //           ->where('created_at', '>=', DB::raw('DATE(NOW()) - INTERVAL 8 DAY'))
        //           ->where('type', 1)
        //           ->groupBy('created_date')
        //           ->limit(7)
        //           ->get();

        // ScriptResponse::distinct()
        //           ->select(DB::raw('count(*) as total ') , DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_date '), DB::raw('DAYNAME(created_at) as dia'))
        //           ->where('created_at', '>=', DB::raw('DATE(NOW()) - INTERVAL 7 DAY'))
        //           ->groupBy('created_date')
        //           ->limit(7)
        //           ->get();

        $data = [
            'user' => User::all()->count(),
            'transactions' => Transaction::all()->count(),
            'published' => Script::all()->count(),
            'xaxis' => [
                'categories' => $dateTime
            ],
            'data' => $dateCount,
        ];

        return $this->showMessage($data);
    }
}
