<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\ScriptType;
use App\Models\UserScriptTypePreset;

class UserSelectScriptTypeController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/user-select-script-type/{id}",
    *      operationId="selectUserScriptType",
    *      tags={"user"},
    *      summary="select a user script type",
    *      description="select a user script type",
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

    public function show($id)
    {
        $scriptType = ScriptType::find($id);

        $questions = $scriptType->presets->pluck('id')->toArray();

        $findUserPresets = UserScriptTypePreset::where('script_id', $scriptType->id)
                ->where('user_id', auth()->user()->id)
                ->whereIn('id', $questions)
                ->get();

        $getExistingQuestions = $findUserPresets->pluck('id')->toArray();

        $questionDifferenceIds = array_diff($questions, $getExistingQuestions);
        $questionAddIds = array_merge($questions, $getExistingQuestions);

        foreach($questionDifferenceIds as $id)
        {
            UserScriptTypePreset::create([
                'script_type_preset_id' => $id,
                'script_id' => $scriptType->id,
                'user_id' => auth()->user()->id,
            ]);
        }

        $findAllUserPresets = UserScriptTypePreset::where('script_id', $scriptType->id)
                ->where('user_id', auth()->user()->id)
                ->whereIn('id', $questionAddIds)
                ->get();
        
        return $this->showAll($findAllUserPresets);
        
    }
}
