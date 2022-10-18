<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\FlaggedScript;
use Illuminate\Http\Request;

class FlaggedScriptController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/flagged-scripts",
     *      operationId="allFlagged",
     *      tags={"Admin"},
     *      summary="Get all flagged script",
     *      description="Get all flagged script",
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
        return $this->showAll(FlaggedScript::all());
    }
}
