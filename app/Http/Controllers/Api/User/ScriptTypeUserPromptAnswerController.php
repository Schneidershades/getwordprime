<?php

namespace App\Http\Controllers\Api\User;

use App\Models\ScriptTypePrompt;
use App\Http\Controllers\Controller;
use App\Models\ScriptTypeUserPromptAnswer;
use App\Http\Requests\User\ScriptTypeUserPromptAnswerCreateFormRequest;
use App\Http\Requests\User\ScriptTypeUserPromptAnswerUpdateFormRequest;

class ScriptTypeUserPromptAnswerController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type-user-prompt-answers",
    *      operationId="allScriptTypeUserPromptAnswer",
    *      tags={"User"},
    *      summary="Get all answers",
    *      description="Get all answers",
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
        return $this->showAll(ScriptTypeUserPromptAnswer::latest()->get());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/script-type-user-prompt-answers",
    *      operationId="postScriptTypeUserPromptAnswer",
    *      tags={"User"},
    *      summary="Post new answers",
    *      description="Post new answers",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypeUserPromptAnswerCreateFormRequest")
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
    public function store(ScriptTypeUserPromptAnswerCreateFormRequest $request)
    {
        return $this->showOne(ScriptTypePrompt::create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/script-type-user-prompt-answers/{id}",
    *      operationId="showScriptTypeUserPromptAnswer",
    *      tags={"User"},
    *      summary="Show an answer",
    *      description="Show an answer",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Script type prompt ID",
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
    *      path="/api/v1/admin/script-type-user-prompt-answers/{id}",
    *      operationId="adminScriptTypeUserPromptAnswer",
    *      tags={"User"},
    *      summary="Update an answer",
    *      description="Update an answer",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Script type prompt ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptTypeUserPromptAnswerUpdateFormRequest")
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
    
    public function update(ScriptTypeUserPromptAnswerUpdateFormRequest $request, ScriptTypeUserPromptAnswer $scriptTypeQuestion)
    {
        $scriptTypeQuestion->update($request->validated());
        return $this->showOne($scriptTypeQuestion);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/admin/script-type-user-prompt-answers/{id}",
    *      operationId="deleteScriptTypeUserPromptAnswer",
    *      tags={"User"},
    *      summary="Delete script-type-user-prompt-answers",
    *      description="Delete script-type-user-prompt-answers",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="script-type-user-prompt-answers ID",
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
