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

        $scriptTypeQuestions = $scriptType->presets->pluck('id')->toArray();

        $findUserPresets = UserScriptTypePreset::where('user_id', auth()->user()->id)
                ->where('script_type_id', $scriptType->id)
                ->whereIn('script_type_preset_id', $scriptTypeQuestions)
                ->get();

        $userExistingQuestions = $findUserPresets->pluck('script_type_preset_id')->toArray();

        $questionDifferenceIds = array_diff($scriptTypeQuestions, $userExistingQuestions);
        $questionAddIds = array_unique(array_merge($scriptTypeQuestions, $userExistingQuestions));

        foreach($questionDifferenceIds as $presetId)
        {
            UserScriptTypePreset::create([
                'script_type_id' => $scriptType->id,
                'script_type_preset_id' => $presetId,
                'user_id' => auth()->user()->id,
            ]);
        }

        $findAllUserPresets = UserScriptTypePreset::where('user_id', auth()->user()->id)
                    ->where('script_type_id', $scriptType->id)
                    ->whereIn('script_type_preset_id', $questionAddIds)
                    ->latest();

        return $this->showAll($findAllUserPresets);
        
    }
}
