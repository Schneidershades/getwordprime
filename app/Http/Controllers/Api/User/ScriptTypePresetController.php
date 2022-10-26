<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\ScriptTypePreset;

class ScriptTypePresetController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/script-type-presets",
     *      operationId="allScriptTypePresets",
     *      tags={"user"},
     *      summary="Get allScriptTypePresets",
     *      description="Get allScriptTypePresets",
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
     * @OA\Get(
     *      path="/api/v1/script-type-presets/{id}",
     *      operationId="showScriptTypePresets",
     *      tags={"user"},
     *      summary="Show an answer",
     *      description="Show an answer",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Script type preset ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
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
    public function show()
    {
        return $this->showAll(ScriptTypePreset::latest()->get());
    }
}
