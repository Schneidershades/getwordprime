<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScriptType;

class ScriptTypeController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type",
    *      operationId="allScriptTypes",
    *      tags={"Admin Script Type"},
    *      summary="Get all Script Types",
    *      description="Get all Script Types",
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
        $this->showAll(ScriptType::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/script-type",
    *      operationId="postScriptType",
    *      tags={"Admin Script Type"},
    *      summary="Post new script types",
    *      description="Post new script types",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypeCreateFormRequest")
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
    public function store(Request $request)
    {
        return $this->showOne(auth()->user()->script types()->create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type/{id}",
    *      operationId="showScriptType",
    *      tags={"Admin Script Type"},
    *      summary="Show an role",
    *      description="Show an role",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ScriptType ID",
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
    public function show(ScriptType $scriptType)
    {
        return $this->showOne(ScriptType::findOrFail($id));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/admin/script-type/{id}",
    *      operationId="updateScriptType",
    *      tags={"Admin Script Type"},
    *      summary="Update an role",
    *      description="Update an role",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="role ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypeCreateFormRequest")
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
    
    public function update(ScriptTypeUpdateFormRequest $request, ScriptType $scriptType)
    {
        return $this->showOne($scriptType->update($request->validated()));
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/admin/script-type/{id}",
    *      operationId="deleteScriptType",
    *      tags={"Admin Script Type"},
    *      summary="Delete an role",
    *      description="Delete an role",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ScriptType ID",
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
    public function destroy(ScriptType $scriptType)
    {
        $scriptType->delete();
        return $this->showMessage('deleted');
    }
}
