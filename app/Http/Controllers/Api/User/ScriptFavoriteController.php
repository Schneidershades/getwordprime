<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Script;
use App\Models\ScriptFavorite;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ScriptCreateFormRequest;

class ScriptFavoriteController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/script-favorite",
    *      operationId="allScriptFavorites",
    *      tags={"user"},
    *      summary="Get all script favorite",
    *      description="Get all script favorite",
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
        $this->showAll(auth()->user()->scripts);
    }

    /**
    * @OA\Post(
    *      path="/api/v1/script-favorite",
    *      operationId="postScriptFavorite",
    *      tags={"reseller"},
    *      summary="Post script favorite",
    *      description="Post script favorite",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptFavoriteCreateFormRequest")
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
    public function store(ScriptCreateFormRequest $request)
    {
        return $this->showOne(auth()->user()->scripts()->create($request->validated()));
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/script-favorite/{id}",
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
        $script =  Script::findOrFail($id);
        $script->delete();
        return $this->showMessage('deleted');
    }
}
