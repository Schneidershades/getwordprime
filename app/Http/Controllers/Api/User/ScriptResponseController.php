<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Models\ScriptResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ScriptResponseUpdateFormRequest;

class ScriptResponseController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/script-responses/{id}",
    *      operationId="showScriptResponses",
    *      tags={"user"},
    *      summary="Show a showScriptResponses",
    *      description="Show a showScriptResponses",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Agency ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      
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

    public function show(ScriptResponse $scriptResponse)
    {        
        return $this->showOne(auth()->user()->scripts->where('id', $scriptResponse->id)->first());
    }

     /**
    * @OA\PUT(
    *      path="/api/v1/scripts/{id}",
    *      operationId="updateScriptResponses",
    *      tags={"user"},
    *      summary="Update a updateScriptResponses",
    *      description="Update a updateScriptResponses",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="updateScriptResponses ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptResponseUpdateFormRequest")
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
    public function update(ScriptResponseUpdateFormRequest $request, ScriptResponse $scriptResponse)
    {
        auth()->user()->scriptResponse->where('id', $scriptResponse->id)->first()->update($request->validated());
        return $this->showOne(auth()->user()->scripts->where('id', $scriptResponse->id)->first());
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/script-responses/{id}",
    *      operationId="deleteScript",
    *      tags={"user"},
    *      summary="Delete an script",
    *      description="Delete an script",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Script ID",
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
    
    public function destroy(ScriptResponse $scriptResponse)
    {
        $scriptResponse->delete();
        return $this->showMessage('deleted');
    }
}
