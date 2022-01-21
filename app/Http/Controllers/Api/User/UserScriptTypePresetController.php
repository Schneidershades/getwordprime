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
        return $this->showAll(auth()->user()->presets);
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
        foreach($request['presets'] as $preset){

            $presets = auth()->user()->presets;

            foreach($presets as $preset){

                if ($preset->script_type_preset_id == $preset['script_type_preset_id'] && $preset->answer == $request['answer']){
                    
                }else{
                    if($preset['user_script_type_preset_id'] == null || $preset['user_script_type_preset_id'] = ""){
                        auth()->user()->presets()->create([
                            'script_type_id' => $preset['script_type_id'],
                            'script_type_preset_id' => $preset['script_type_preset_id'],
                            'answers' => $preset['answer']
                        ]);
                    }else{
                        $userPreset = UserScriptTypePreset::find($preset['user_script_type_preset_id']);

                        $userPreset->update([
                            'script_type_id' => $preset['script_type_id'],
                            'script_type_preset_id' => $preset['script_type_preset_id'],
                            'answers' => $preset['answer']
                        ]);
                            
                    }
                }
            }
        }

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
    *      path="/api/v1/user-script-type-presets/{script_type_id}",
    *      operationId="adminScriptTypeUserPromptAnswer",
    *      tags={"user"},
    *      summary="Update an answer",
    *      description="Update an answer",
    *      
     *      @OA\Parameter(
     *          name="script_type_id",
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
        foreach($request['presets'] as $preset){

            $userPreset = UserScriptTypePreset::find($preset['user_script_type_preset_id']);

            if ($userPreset != null){

                $userAnswers = auth()->user()->presets;

                foreach($userAnswers as $p){

                    if ($preset->script_type_preset_id == $preset['script_type_preset_id'] && $preset->answer == $request['answer']){
                    }else{
                        $userPreset->update([
                            'script_type_id' => $preset['script_type_id'],
                            'script_type_preset_id' => $preset['script_type_preset_id'],
                            'answers' => $preset['answer']
                        ]);
                              
                    }
                }
            }else{
                auth()->user()->presets()->create([
                    'script_type_id' => $preset['script_type_id'],
                    'script_type_preset_id' => $preset['script_type_preset_id'],
                    'answers' => $preset['answer']
                ]);
            }
        }
        
        return $this->showAll(UserScriptTypePreset::where('script_type_id', $preset['script_type_id'])->get());
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
