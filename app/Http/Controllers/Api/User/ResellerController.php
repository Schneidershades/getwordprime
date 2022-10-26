<?php

namespace App\Http\Controllers\Api\User;

use App\Events\User\NewUserEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ResellerCreateFormRequest;
use App\Http\Requests\User\ResellerUpdateFormRequest;
use App\Models\User;

class ResellerController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/reseller",
     *      operationId="allResellers",
     *      tags={"user"},
     *      summary="Get all reseller",
     *      description="Get all reseller",
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
        return $this->showAll(auth()->user()->resellers);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/reseller",
     *      operationId="postResellers",
     *      tags={"user"},
     *      summary="Post new reseller",
     *      description="Post new reseller",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ResellerCreateFormRequest")
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
    public function store(ResellerCreateFormRequest $request)
    {
        $user = auth()->user()->resellers()->create($request->validated());

        $user->plans()->sync($request['plans']);

        event(new NewUserEvent($user, $request['password']));

        return $this->showOne($user);
    }

    /**
     * @OA\Get(
     *      path="/api/v1/reseller/{id}",
     *      operationId="showReseller",
     *      tags={"user"},
     *      summary="Show an reseller",
     *      description="Show an reseller",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Agency ID",
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
    public function show(User $user)
    {
        return $this->showOne(auth()->user()->reseller->where('id', $user->id)->first());
    }

    /**
     * @OA\PUT(
     *      path="/api/v1/reseller/{id}",
     *      operationId="updateReseller",
     *      tags={"user"},
     *      summary="Update an reseller",
     *      description="Update an reseller",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Agency ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ResellerUpdateFormRequest")
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
    public function update(ResellerUpdateFormRequest $request, User $user)
    {
        auth()->user()->reseller->where('id', $user->id)->first()->update($request->validated());
        $user->plans()->sync($request['plans']);

        return $this->showOne($user);
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/resellers/{id}",
     *      operationId="deleteReseller",
     *      tags={"user"},
     *      summary="Delete an reseller",
     *      description="Delete an reseller",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Reseller ID",
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
    public function destroy(User $user)
    {
        $user->delete();

        return $this->showMessage('deleted');
    }
}
