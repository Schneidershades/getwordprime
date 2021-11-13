<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\ScriptTypePrompt;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScriptTypePromptCreateFormRequest;
use App\Http\Requests\Admin\ScriptTypePromptUpdateFormRequest;

class ScriptTypePromptController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type-prompts",
    *      operationId="allScriptTypePrompts",
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
        return $this->showAll(ScriptTypePrompt::latest()->get());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/script-type-prompts",
    *      operationId="postScriptTypePrompts",
    *      tags={"Admin"},
    *      summary="Post script-type-prompts",
    *      description="Post script-type-prompts",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypePromptCreateFormRequest")
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
    public function store(ScriptTypePromptCreateFormRequest $request)
    {
        return $this->showOne(ScriptTypePrompt::create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type-prompts/{id}",
    *      operationId="showScriptTypePrompts",
    *      tags={"Admin"},
    *      summary="Show a script-type-prompt",
    *      description="Show a script-type-prompt",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="script-type-prompt ID",
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
    public function show(ScriptTypePrompt $id)
    {
        return $this->showOne(ScriptTypePrompt::findOrFail($id));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/admin/script-type-prompts/{id}",
    *      operationId="adminScriptTypePrompts",
    *      tags={"Admin"},
    *      summary="Update a script-type-prompt",
    *      description="Update a script-type-prompt",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="script-type-prompt ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypePromptUpdateFormRequest")
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
    
    public function update(ScriptTypePromptUpdateFormRequest $request, ScriptTypePrompt $scriptTypeQuestion)
    {
        $scriptTypeQuestion->update($request->validated());
        return $this->showOne($scriptTypeQuestion);
    }

    
     /**
    * @OA\Delete(
    *      path="/api/v1/admin/script-type-prompts/{id}",
    *      operationId="deleteScriptTypePrompt",
    *      tags={"Admin"},
    *      summary="Delete script-type-prompts",
    *      description="Delete script-type-prompts",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="script-type-prompts ID",
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
    public function destroy(ScriptTypePrompt $scriptTypeQuestion)
    {
        $scriptTypeQuestion->delete();
        return $this->showMessage('deleted');
    }
}
