<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ScriptTypePresetCreateFormRequest;
use App\Http\Requests\Admin\ScriptTypePresetUpdateFormRequest;
use App\Models\ScriptTypePreset;

class ScriptTypePresetController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/script-type-presets",
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
        return $this->showAll(ScriptTypePreset::latest()->get());
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/script-type-presets",
     *      operationId="postScriptTypePrompts",
     *      tags={"Admin"},
     *      summary="Post script-type-prompts",
     *      description="Post script-type-prompts",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ScriptTypePresetCreateFormRequest")
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
    public function store(ScriptTypePresetCreateFormRequest $request)
    {
        return $this->showOne(ScriptTypePreset::create($request->validated()));
    }

    /**
     * @OA\Get(
     *      path="/api/v1/admin/script-type-presets/{id}",
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
    public function show(ScriptTypePreset $id)
    {
        return $this->showOne(ScriptTypePreset::findOrFail($id));
    }

    /**
     * @OA\Put(
     *      path="/api/v1/admin/script-type-presets/{id}",
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
     *          @OA\JsonContent(ref="#/components/schemas/ScriptTypePresetUpdateFormRequest")
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
    public function update(ScriptTypePresetUpdateFormRequest $request, ScriptTypePreset $scriptTypePreset)
    {
        $scriptTypePreset->update($request->validated());

        return $this->showOne($scriptTypePreset);
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/admin/script-type-presets/{id}",
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
    public function destroy(ScriptTypePreset $scriptTypePreset)
    {
        $scriptTypePreset->delete();

        return $this->showMessage('deleted');
    }
}
