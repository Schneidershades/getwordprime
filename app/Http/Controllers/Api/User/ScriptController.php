<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Script;
use App\Http\Controllers\Controller;
use App\Traits\Plugins\OpenAi\OpenAi;
use App\Http\Requests\User\ScriptCreateFormRequest;
use App\Http\Requests\User\ScriptUpdateFormRequest;

class ScriptController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/script",
    *      operationId="allScripts",
    *      tags={"script"},
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
        $this->showAll(auth()->user()->scripts);
    }

    /**
    * @OA\Post(
    *      path="/api/v1/scripts",
    *      operationId="postScripts",
    *      tags={"script"},
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
        return $this->showOne(auth()->user()->scripts()->create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/scripts/{id}",
    *      operationId="showScript",
    *      tags={"script"},
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
        $openai = new OpenAi();
        return $openai->request("ada", "This is a test", 5);
        
        // return $this->showOne(auth()->user()->scripts->where('id', $script->id)->first());
    }

     /**
    * @OA\PUT(
    *      path="/api/v1/scripts/{id}",
    *      operationId="updateScript",
    *      tags={"script"},
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
    *      tags={"script"},
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
