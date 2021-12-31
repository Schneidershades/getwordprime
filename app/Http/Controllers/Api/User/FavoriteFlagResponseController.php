<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserFavoriteAndFlagScriptResponseCreateFormRequest;
use App\Models\ScriptResponse;

class FavoriteFlagResponseController extends Controller
{
    /**
    * @OA\Post(
    *      path="/api/v1/favorite-flag-responses",
    *      operationId="postScriptFavorite",
    *      tags={"user"},
    *      summary="Post script favorite",
    *      description="Post script favorite",
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

     /**
    * @OA\Delete(
    *      path="/api/v1/avorite-flag-responses/{id}",
    *      operationId="deleteReseller",
    *      tags={"user"},
    *      summary="Delete an script favorite",
    *      description="Delete an script favorite",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Script favorite ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
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
    

    public function destroy($id)
    {
        $script =  ScriptResponse::findOrFail($id);
        $script->delete();
        return $this->showMessage('deleted');
    }
}
