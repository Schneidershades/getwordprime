<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanStoreFormRequest;
use App\Http\Requests\Admin\PlanUpdateFormRequest;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Builder;

class PlanController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/plans",
     *      operationId="allPlans",
     *      tags={"Admin"},
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
        $search_query = request()->get('search') ? request()->get('search') : null;

        $plans = Plan::query()
                ->selectRaw('plans.*')
                ->when($search_query, function (Builder $builder, $search_query) {
                    $builder->where('plans.name', 'LIKE', "%{$search_query}%")
                    ->orWhere('plan.type', 'LIKE', "%{$search_query}%");
                })->latest()->get();

        return $this->showAll($plans);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/plans",
     *      operationId="postPlans",
     *      tags={"Admin"},
     *      summary="Post new plans",
     *      description="Post new plans",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/PlanStoreFormRequest")
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
     *      path="/api/v1/admin/plans/{id}",
     *      operationId="showPlan",
     *      tags={"Admin"},
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
     *      path="/api/v1/admin/plans/{id}",
     *      operationId="PlanUpdate",
     *      tags={"Admin"},
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
     *          @OA\JsonContent(ref="#/components/schemas/PlanUpdateFormRequest")
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
     *      path="/api/v1/admin/plans/{id}",
     *      operationId="deletePlan",
     *      tags={"Admin"},
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
