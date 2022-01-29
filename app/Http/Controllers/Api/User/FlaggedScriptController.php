<?php

namespace App\Http\Controllers\Api\User;

use App\Models\FlaggedScript;
use App\Models\ScriptResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreFlagScriptFormRequest;

class FlaggedScriptController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/flagged-script-responses",
    *      operationId="allFlaggedScripts",
    *      tags={"user"},
    *      summary="allFlaggedScripts",
    *      description="allFlaggedScripts",
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
        return(auth()->user()->flaggedScripts);
        return $this->showAll(auth()->user()->flaggedScripts);
    }

     /**
    * @OA\Post(
    *      path="/api/v1/flagged-script-responses",
    *      operationId="postScriptFavorite",
    *      tags={"user"},
    *      summary="Post script flagged",
    *      description="Post script flagged",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/StoreFlagScriptFormRequest")
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

    public function store(StoreFlagScriptFormRequest $request)
    {
        $model = ScriptResponse::findOrFail($request['script_response_id']);
        
        if($model->favorite != null){
            $model->favorite()->delete();
            return $this->showMessage('Script has been removed from flagged scripts');
        }else{
            $favorite = new FlaggedScript;
            $favorite->user_id = auth()->user()->id;
            $favorite->script_response_id = $model->id;
            $model->favorite()->save($favorite);
            return $this->showMessage('Script has been added to flagged scripts');
        }


    }
}
