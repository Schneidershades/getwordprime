<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Plan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanStoreFormRequest;
use App\Http\Requests\Admin\PlanUpdateFormRequest;

class PlanController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/plans",
    *      operationId="allPlans",
    *      tags={"user"},
    *      summary="Get all plans",
    *      description="Get all plans",
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
        return $this->showAll(Plan::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/plans",
    *      operationId="postPlans",
    *      tags={"user"},
    *      summary="Post new plans",
    *      description="Post new plans",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/PlanCreateFormRequest")
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
    public function store(PlanStoreFormRequest $request)
    {
        return $this->showOne(Plan::create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/plans/{id}",
    *      operationId="showPlan",
    *      tags={"user"},
    *      summary="Show an plan",
    *      description="Show an plan",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Plan ID",
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
        return $this->showOne(Plan::find($id));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/plans/{id}",
    *      operationId="PlanUpdate",
    *      tags={"user"},
    *      summary="Update an plan",
    *      description="Update an plan",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="plan ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/PlanCreateFormRequest")
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
    
    public function update(PlanUpdateFormRequest $request, $id)
    {
        Plan::find($id)->update($request->validated());
        return $this->showOne(Plan::find($id));
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/plans/{id}",
    *      operationId="deletePlan",
    *      tags={"user"},
    *      summary="Delete an plan",
    *      description="Delete an plan",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Plan ID",
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
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return $this->showMessage('deleted');
    }
}
