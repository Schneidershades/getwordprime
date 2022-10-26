<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\ScriptType;

class ScriptTypeController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/script-types",
     *      operationId="allUserScriptTypes",
     *      tags={"user"},
     *      summary="Get Script-type",
     *      description="Get script-types",
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
        return $this->showAll(ScriptType::all());
    }

    /**
     * @OA\Get(
     *      path="/api/v1/script-types/{id}",
     *      operationId="showUserScriptType",
     *      tags={"user"},
     *      summary="Show script type",
     *      description="Show script type",
     *      @OA\Parameter(
     *          name="id",
     *          description="Script Type ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
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
    public function show(ScriptType $scriptType)
    {
        return $this->showOne($scriptType);
    }
}
