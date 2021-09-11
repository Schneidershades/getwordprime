<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\ScriptTypeAttribute;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScriptTypeAttributeCreateFormRequest;
use App\Http\Requests\Admin\ScriptTypeAttributeUpdateFormRequest;

class ScriptTypeAttributeController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type-attributes",
    *      operationId="allScriptTypeAttributes",
    *      tags={"Admin"},
    *      summary="Get script-type-attributes",
    *      description="Get script-type-attributes",
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
        $this->showAll(auth()->user()->roles);
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/script-type-attributes",
    *      operationId="postScriptTypeAttributes",
    *      tags={"Admin"},
    *      summary="Post script-type-attributes",
    *      description="Post script-type-attributes",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypeAttributeCreateFormRequest")
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
    public function store(ScriptTypeAttributeCreateFormRequest $request)
    {
        return $this->showOne(ScriptTypeAttribute::create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type-attributes/{id}",
    *      operationId="showScriptTypeAttributes",
    *      tags={"Admin"},
    *      summary="Show script-type-attributes",
    *      description="Show script-type-attributes",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ScriptTypeAttribute ID",
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
    public function show(ScriptTypeAttribute $role)
    {
        return $this->showOne(ScriptTypeAttribute::findOrFail($id));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/admin/script-type-attributes/{id}",
    *      operationId="adminScriptTypeAttributes",
    *      tags={"Admin"},
    *      summary="Update script-type-attributes",
    *      description="Update script-type-attributes",
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
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypeAttributeUpdateFormRequest")
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
    
    public function update(ScriptTypeAttributeUpdateFormRequest $request, ScriptTypeAttribute $role)
    {
        return $this->showOne($role->update($request->validated()));
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/admin/script-type-attributes/{id}",
    *      operationId="deleteScriptTypeAttributes",
    *      tags={"Admin"},
    *      summary="Delete script-type-attributes",
    *      description="Delete script-type-attributes",
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
    public function destroy(ScriptTypeAttribute $role)
    {
        $role->delete();
        return $this->showMessage('deleted');
    }
}
