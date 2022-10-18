<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BonusStoreFormRequest;
use App\Http\Requests\Admin\BonusUpdateFormRequest;
use App\Models\Bonus;
use Illuminate\Database\Eloquent\Builder;

class BonusController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/bonuses",
     *      operationId="allBonuss",
     *      tags={"Admin"},
     *      summary="Get all bonuses",
     *      description="Get all bonuses",
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

        $bonuses = Bonus::query()
                ->selectRaw('bonuses.*')
                ->when($search_query, function (Builder $builder, $search_query) {
                    $builder->where('bonuses.name', 'LIKE', "%{$search_query}%")
                    ->where('bonuses.description', 'LIKE', "%{$search_query}%")
                    ->where('bonuses.url', 'LIKE', "%{$search_query}%");
                })->latest()->get();

        return $this->showAll($bonuses);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/bonuses",
     *      operationId="postBonuss",
     *      tags={"Admin"},
     *      summary="Post new bonuses",
     *      description="Post new bonuses",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/BonusStoreFormRequest")
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
    public function store(BonusStoreFormRequest $request)
    {
        return $this->showOne(Bonus::create($request->validated()));
    }

    /**
     * @OA\Get(
     *      path="/api/v1/admin/bonuses/{id}",
     *      operationId="showBonus",
     *      tags={"Admin"},
     *      summary="Show an bonus",
     *      description="Show an bonus",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Bonus ID",
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
        return $this->showOne(Bonus::find($id));
    }

    /**
     * @OA\Put(
     *      path="/api/v1/admin/bonuses/{id}",
     *      operationId="BonusUpdate",
     *      tags={"Admin"},
     *      summary="Update an bonus",
     *      description="Update an bonus",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="bonus ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/BonusUpdateFormRequest")
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
    public function update(BonusUpdateFormRequest $request, $id)
    {
        Bonus::find($id)->update($request->validated());

        return $this->showOne(Bonus::find($id));
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/admin/bonuses/{id}",
     *      operationId="deleteBonus",
     *      tags={"Admin"},
     *      summary="Delete an bonus",
     *      description="Delete an bonus",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="Bonus ID",
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
    public function destroy(Bonus $bonus)
    {
        $bonus->delete();

        return $this->showMessage('deleted');
    }
}
