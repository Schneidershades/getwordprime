<?php

namespace App\Http\Controllers\Api\User;

use App\Models\FavoriteScript;
use App\Models\ScriptResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreFavoriteScriptFormRequest;

class FavoriteScriptController extends Controller
{
    /**
    * @OA\Post(
    *      path="/api/v1/favorite-script-responses",
    *      operationId="postScriptFavorite",
    *      tags={"user"},
    *      summary="Post script favorite",
    *      description="Post script favorite",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/StoreFavoriteScriptFormRequest")
    *      ),
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

    public function store(StoreFavoriteScriptFormRequest $request)
    {
        $model = ScriptResponse::findOrFail($request['script_response_id']);
        $favorite = $model->flagged ?: new FavoriteScript;
        $favorite->user_id = auth()->user()->id;
        $model->favorite()->save($favorite);

        return $this->showOne($model);
    }
}
