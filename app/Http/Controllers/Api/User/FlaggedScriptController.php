<?php

namespace App\Http\Controllers\Api\User;

use App\Models\FlaggedScript;
use App\Models\ScriptResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreFlagScriptFormRequest;

class FlaggedScriptController extends Controller
{
     /**
    * @OA\Post(
    *      path="/api/v1/flagged-script-responses",
    *      operationId="postScriptFavorite",
    *      tags={"user"},
    *      summary="Post script flagged",
    *      description="Post script flagged",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/StoreFlagScriptFormRequest")
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

    public function store(StoreFlagScriptFormRequest $request)
    {
        $model = ScriptResponse::findOrFail($request['script_response_id']);
        $flagged = $model->flagged ?: new FlaggedScript;
        $flagged->user_id = auth()->user()->id;
        $model->flagged()->save($flagged);
        return $this->showOne($model);
    }
}
