<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Script;
use App\Models\ScriptResponse;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $dateTime = ScriptResponse::where('created_at', '>=', Carbon::now()->subDays(9))
                ->groupBy('date')
                ->orderBy('date', 'DESC')
                ->get([
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as "words"'),
                ])->pluck('date')->toArray();

        $dateCount = ScriptResponse::where('created_at', '>=', Carbon::now()->subDays(9))
                ->groupBy('date')
                ->orderBy('date', 'DESC')
                ->get([
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as "words"'),
                ])->pluck('words')->toArray();

        $data = [
            'user' => User::all()->count(),
            'transactions' => Transaction::all()->count(),
            'published' => Script::all()->count(),
            'xaxis' => [
                'categories' => $dateTime,
            ],
            'data' => $dateCount,
        ];

        return $this->showMessage($data);
    }
}
