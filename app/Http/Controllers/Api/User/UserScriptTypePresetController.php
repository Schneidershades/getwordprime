<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\UserScriptTypePreset;
use App\Http\Requests\User\UserScriptTypePresetCreateFormRequest;
use App\Http\Requests\User\UserScriptTypePresetUpdateFormRequest;

class UserScriptTypePresetController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/user-script-type-presets",
    *      operationId="allScriptTypeUserPromptAnswer",
    *      tags={"user"},
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
        return $this->showAll(UserScriptTypePreset::latest()->get());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/user-script-type-presets",
    *      operationId="postScriptTypeUserPromptAnswer",
    *      tags={"user"},
    *      summary="Post new answers",
    *      description="Post new answers",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/UserScriptTypePresetCreateFormRequest")
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
    public function store(UserScriptTypePresetCreateFormRequest $request)
    {
        return $this->showOne(auth()->user()->presets()->create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/user-script-type-presets/{id}",
    *      operationId="showScriptTypeUserPromptAnswer",
    *      tags={"user"},
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
    public function show($id)
    {
        return $this->showOne(UserScriptTypePreset::findOrFail($id));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/user-script-type-presets/{id}",
    *      operationId="adminScriptTypeUserPromptAnswer",
    *      tags={"user"},
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
    *          @OA\JsonContent(ref="#/components/schemas/UserScriptTypePresetUpdateFormRequest")
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
    
    public function update(UserScriptTypePresetUpdateFormRequest $request, $id)
    {
        $userScriptTypePreset = UserScriptTypePreset::find($id);
        $userScriptTypePreset->update($request->validated());
        return $this->showOne($userScriptTypePreset);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/user-script-type-presets/{id}",
    *      operationId="deleteScriptTypeUserPromptAnswer",
    *      tags={"user"},
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
    public function destroy($id)
    {
        $userScriptTypePreset = UserScriptTypePreset::find($id);
        $userScriptTypePreset->delete();
        return $this->showMessage('deleted');
    }
}
