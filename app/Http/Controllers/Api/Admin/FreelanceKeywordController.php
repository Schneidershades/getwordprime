<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateFreelancerKeywordRequest;
use App\Models\FreelancerKeyword;

class FreelanceKeywordController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/freelancer-keyword",
     *      operationId="allFreelancerKeyword",
     *      tags={"Admin"},
     *      summary="Get languages",
     *      description="Get languages",
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
        return $this->showOne(FreelancerKeyword::first());
    }

    /**
     * @OA\Get(
     *      path="/api/v1/admin/freelancer-keyword/{id}",
     *      operationId="showFreelancerKeyword",
     *      tags={"Admin"},
     *      summary="Show freelancer-keyword",
     *      description="Show freelancer-keyword",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="freelancer-keyword ID",
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
    public function show(FreelancerKeyword $freelancerKeyword)
    {
        return $this->showOne($freelancerKeyword);
    }

    /**
     * @OA\Put(
     *      path="/api/v1/admin/freelancer-keyword/{id}",
     *      operationId="updateFreelancerKeyword",
     *      tags={"Admin"},
     *      summary="Update freelancer-keyword",
     *      description="Update freelancer-keyword",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="role ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateLanguageRequest")
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
    public function update(UpdateFreelancerKeywordRequest $request, FreelancerKeyword $freelancerKeyword)
    {
        $freelancerKeyword->update($request->validated());

        return $this->showOne($freelancerKeyword);
    }
}
