<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Script;
use App\Http\Controllers\Controller;
use App\Traits\Plugins\OpenAi\OpenAi;
use App\Http\Requests\User\ScriptCreateFormRequest;
use App\Http\Requests\User\ScriptUpdateFormRequest;
use App\Models\ScriptResponse;
use App\Models\ScriptType;
use App\Models\UserScriptTypePreset;

class ScriptController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/scripts",
    *      operationId="allScripts",
    *      tags={"user"},
    *      summary="Get all script",
    *      description="Get all script",
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
        return $this->showAll(auth()->user()->scripts);
    }

    /**
    * @OA\Post(
    *      path="/api/v1/scripts",
    *      operationId="postScripts",
    *      tags={"user"},
    *      summary="Post new script",
    *      description="Post new script",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptCreateFormRequest")
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
        $scriptType = ScriptType::find($request['script_type_id']);

        $presets = $scriptType->presets->pluck('id')->toArray();

        $countPresets = $scriptType->presets->count();

        $userAnswers = UserScriptTypePreset::where('user_id', auth()->user()->id)
                            ->whereIn('script_type_preset_id', $presets)
                            ->get();

        if($countPresets < $userAnswers->count()){
            return $this->errorResponse('In other to generate a script kindly set all the answers in the script type questions', 422);
        }

        $submissionToOpenAi = "";

        $submissionToOpenAi .= $scriptType->prompt_1. " \n";
        $submissionToOpenAi .= '""""""'. " \n";
        $submissionToOpenAi .= $scriptType->prompt_2. " \n";
        $submissionToOpenAi .= '""""""'. " \n";

        foreach($userAnswers as $answer){
            if($answer['answers'] != null){
                $submissionToOpenAi .= $answer['answers']. " \n";
                $submissionToOpenAi .= '""""""'. " \n";
            }
        }

        $generate = (new OpenAi)->ad($submissionToOpenAi, $scriptType);
        
        $script = Script::create([
            'name' => $request['name'],
            'user_id' => auth()->user()->id,
            'campaign_id' => $request['campaign_id'],
            'script_type_id' => $request['script_type_id'],
            'content' => $request['name'],
            'object' => $generate->object,
            'created' => $generate->created,
            'model' => $generate->model,
        ]);
        
        foreach($generate->choices as $choice){
            ScriptResponse::create([
                'text' => $choice->text,
                'index' => $choice->index,
                'logprobs' => $choice->logprobs,
                'finish_reason' => $choice->finish_reason,
                'script_id' => $script->id,
            ]);
        }

        return $this->showOne($script);
    }

    /**
    * @OA\Get(
    *      path="/api/v1/scripts/{id}",
    *      operationId="showScript",
    *      tags={"user"},
    *      summary="Show an script",
    *      description="Show an script",
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

    public function show(Script $script)
    {
        // $openai = new OpenAi();
        // return $openai->request("ada", "This is a test", 5);
        
        return $this->showOne(auth()->user()->scripts->where('id', $script->id)->first());
    }

     /**
    * @OA\PUT(
    *      path="/api/v1/scripts/{id}",
    *      operationId="updateScript",
    *      tags={"user"},
    *      summary="Update an script",
    *      description="Update an script",
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
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ScriptUpdateFormRequest")
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
    public function update(ScriptUpdateFormRequest $request, Script $script)
    {
        auth()->user()->scripts->where('id', $script->id)->first()->update($request->validated());
        return $this->showOne(auth()->user()->scripts->where('id', $script->id)->first());
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/scripts/{id}",
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
    
    public function destroy(Script $script)
    {
        $script->delete();
        return $this->showMessage('deleted');
    }
}
