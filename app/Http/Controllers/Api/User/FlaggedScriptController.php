<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;

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
    *          @OA\JsonContent(ref="#/components/schemas/UserFavoriteAndFlagScriptResponseCreateFormRequest")
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

    public function store(UserFavoriteAndFlagScriptResponseCreateFormRequest $request)
    {
        if($request['type'] == 'flag'){
            $response = ScriptResponse::where('id', $request['script_response_id'])->first();
            $response->active = false;
            $response->save();
        }

        return $this->showOne(auth()->user()->scriptsResponses()->create($request->validated()));
    }
}
