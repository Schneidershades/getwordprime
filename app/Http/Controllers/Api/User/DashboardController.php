<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\ScriptResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $dateTime = ScriptResponse::where('created_at', '>=', Carbon::now()->subDays(9))->where('user_id', auth()->user()->id)
                ->groupBy('date')
                ->orderBy('date', 'DESC')
                ->get([
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as "words"'),
                ])->pluck('date')->toArray();

        $dateCount = ScriptResponse::where('created_at', '>=', Carbon::now()->subDays(9))->where('user_id', auth()->user()->id)
                ->groupBy('date')
                ->orderBy('date', 'DESC')
                ->get([
                    DB::raw('DATE(created_at) as date'),
                    DB::raw('COUNT(*) as "words"'),
                ])->pluck('words')->toArray();

        $data = [
            'words' => auth()->user()->scriptsResponses->sum('word_count'),
            'copies' => auth()->user()->scriptsResponses->count(),
            'balance' => 0,
            'xaxis' => [
                'categories' => $dateTime,
            ],
            'data' => $dateCount,
        ];

        return $this->showMessage($data);
    }
}
