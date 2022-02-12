<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\FavoriteScript;

class FavoriteScriptController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/favorite-scripts",
    *      operationId="allFavorite",
    *      tags={"Admin"},
    *      summary="Get all favorite script",
    *      description="Get all favorite script",
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
        return $this->showAll(FavoriteScript::all());
    }
}