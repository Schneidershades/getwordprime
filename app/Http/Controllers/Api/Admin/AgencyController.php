<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AgencyCreateFormRequest;
use App\Http\Requests\User\AgencyUpdateFormRequest;
use App\Models\Agency;
use Illuminate\Database\Eloquent\Builder;

class AgencyController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/agencies",
     *      operationId="allAdminAgencies",
     *      tags={"Admin"},
     *      summary="Get Agencys",
     *      description="Get Agencys",
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

        $agencies = Agency::query()
                ->selectRaw('agencies.*')
                ->when($search_query, function (Builder $builder, $search_query) {
                    $builder->where('agencies.name', 'LIKE', "%{$search_query}%")
                    ->where('agencies.email', 'LIKE', "%{$search_query}%");
                })->latest()->get();

        return $this->showAll($agencies);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/agencies",
     *      operationId="postAdminAgencies",
     *      tags={"Admin"},
     *      summary="Post agencies",
     *      description="Post agencies",
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
        return $this->showOne(Agency::create($request->validated()));
    }

    /**
     * @OA\Get(
     *      path="/api/v1/admin/agencies/{id}",
     *      operationId="showAgencys",
     *      tags={"Admin"},
     *      summary="Show agency",
     *      description="Show agency",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Agencys ID",
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
    public function show(Agency $agency)
    {
        return $this->showOne($agency);
    }

    /**
     * @OA\Put(
     *      path="/api/v1/admin/agencies/{id}",
     *      operationId="updateAdminAgencys",
     *      tags={"Admin"},
     *      summary="Update agency",
     *      description="Update agency",
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
     *          @OA\JsonContent(ref="#/components/schemas/AgencyUpdateFormRequest")
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
    public function update(AgencyUpdateFormRequest $request, Agency $agency)
    {
        $agency->update($request->validated());

        return $this->showOne($agency);
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/admin/agencies/{id}",
     *      operationId="deleteAdminAgencys",
     *      tags={"Admin"},
     *      summary="Delete agency",
     *      description="Delete agency",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Agencys ID",
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
