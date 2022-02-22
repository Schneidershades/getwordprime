<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\ScriptTypeCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreScriptTypeCategoryRequest;
use App\Http\Requests\Admin\UpdateScriptTypeCategoryRequest;

class ScriptTypeCategoryController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type-categories",
    *      operationId="allScriptTypeCategorys",
    *      tags={"Admin"},
    *      summary="Get script-type-categories",
    *      description="Get script-type-categories",
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
        return $this->showAll(ScriptTypeCategory::latest()->get());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/script-type-categories",
    *      operationId="postScriptTypeCategorys",
    *      tags={"Admin"},
    *      summary="Post script-type-categories",
    *      description="Post script-type-categories",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypeCategoryCreateFormRequest")
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
    public function store(StoreScriptTypeCategoryRequest $request)
    {
        return $this->showOne(ScriptTypeCategory::create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type-categories/{id}",
    *      operationId="showScriptTypeCategorys",
    *      tags={"Admin"},
    *      summary="Show script-type-categories",
    *      description="Show script-type-categories",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ScriptTypeCategory ID",
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
    public function show(ScriptTypeCategory $scriptTypeCategory)
    {
        return $this->showOne(ScriptTypeCategory::findOrFail($scriptTypeCategory));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/admin/script-type-categories/{id}",
    *      operationId="adminScriptTypeCategorys",
    *      tags={"Admin"},
    *      summary="Update script-type-categories",
    *      description="Update script-type-categories",
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
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypeCategoryUpdateFormRequest")
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
    
    public function update(UpdateScriptTypeCategoryRequest $request, ScriptTypeCategory $scriptTypeCategory)
    {
        $scriptTypeCategory->update($request->validated());
        return $this->showOne($scriptTypeCategory);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/admin/script-type-categories/{id}",
    *      operationId="deleteScriptTypeCategorys",
    *      tags={"Admin"},
    *      summary="Delete script-type-categories",
    *      description="Delete script-type-categories",
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
    public function destroy(ScriptTypeCategory $scriptTypeCategory)
    {
        $scriptTypeCategory->delete();
        return $this->showMessage('deleted');
    }
}
