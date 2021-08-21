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
    *      operationId="allScriptTypeQuestions",
    *      tags={"Admin"},
    *      summary="Get all roles",
    *      description="Get all roles",
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
    *      path="/api/v1/script-type",
    *      operationId="postScriptType",
    *      tags={"Admin"},
    *      summary="Post script type",
    *      description="Post script type",
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
        return $this->showOne(ScriptType::create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type/{id}",
    *      operationId="showScriptType",
    *      tags={"Admin"},
    *      summary="Show script type",
    *      description="Show script type",
    *      @OA\Parameter(
    *          name="id",
    *          description="Script Type ID",
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
    public function show(ScriptType $scriptType)
    {
        return $this->showOne(ScriptType::findOrFail($id));
    }

    
    /**
    * @OA\Put(
    *      path="/api/v1/admin/script-type/{id}",
    *      operationId="updateScriptType",
    *      tags={"Admin"},
    *      summary="Update script-type",
    *      description="Update script-type",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="script-type ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypeUpdateFormRequest")
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
    *      tags={"Admin"},
    *      summary="Delete script-type",
    *      description="Delete script-type",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="script-type ID",
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
