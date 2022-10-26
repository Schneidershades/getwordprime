<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Tutorial;

class TutorialController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/tutorials",
     *      operationId="allUserTutorials",
     *      tags={"user"},
     *      summary="allTutorials",
     *      description="allTutorials",
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
        return $this->showAll(Tutorial::all());
    }

    /**
     * @OA\Get(
     *      path="/api/v1/tutorials/{id}",
     *      operationId="showTutorials",
     *      tags={"user"},
     *      summary="showTutorials",
     *      description="showTutorials",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Tutorials ID",
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
    public function show(Tutorial $tutorials)
    {
        return $this->showOne($tutorials);
    }
}
