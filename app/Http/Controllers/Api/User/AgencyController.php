<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AgencyCreateFormRequest;
use App\Http\Requests\User\AgencyUpdateFormRequest;
use App\Models\Agency;

class AgencyController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/agencies",
     *      operationId="userAgencies",
     *      tags={"user"},
     *      summary="Get all agencies",
     *      description="Get all agencies",
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
        return $this->showAll(auth()->user()->agencies);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/agencies",
     *      operationId="postUserAgencies",
     *      tags={"user"},
     *      summary="Post new agencies",
     *      description="Post new agencies",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/AgencyCreateFormRequest")
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
    public function store(AgencyCreateFormRequest $request)
    {
        $agency = auth()->user()->agencies()->create($request->validated());

        return $this->showOne($agency);
    }

    /**
     * @OA\Get(
     *      path="/api/v1/agencies/{id}",
     *      operationId="showUserAgency",
     *      tags={"user"},
     *      summary="Show an agency",
     *      description="Show an agency",
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
    public function show($id)
    {
        return $this->showOne(auth()->user()->agencies->where('id', $id)->first());
    }

    /**
     * @OA\Put(
     *      path="/api/v1/agencies/{id}",
     *      operationId="AgencyUserUpdate",
     *      tags={"user"},
     *      summary="Update an agency",
     *      description="Update an agency",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="agency ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/AgencyCreateFormRequest")
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
    public function update(AgencyUpdateFormRequest $request, $id)
    {
        auth()->user()->agencies->where('id', $id)->first()->update($request->validated());

        $agency = auth()->user()->agencies->where('id', $id)->first();

        $agency->campaigns()->sync($request['campaigns']);

        return $this->showOne($agency);
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/agencies/{id}",
     *      operationId="deleteUserAgency",
     *      tags={"user"},
     *      summary="Delete an agency",
     *      description="Delete an agency",
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
    public function destroy(Agency $agency)
    {
        $agency->delete();

        return $this->showMessage('deleted');
    }
}
