<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SuggestionCreateFormRequest;
use App\Models\Suggestion;
use Illuminate\Database\Eloquent\Builder;

class SuggestionController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/suggestions",
     *      operationId="allAdminSuggestion",
     *      tags={"Admin"},
     *      summary="Get suggestions",
     *      description="Get suggestions",
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

        $suggestions = Suggestion::query()
                ->selectRaw('suggestions.*')
                ->when($search_query, function (Builder $builder, $search_query) {
                    $builder->where('suggestions.message', 'LIKE', "%{$search_query}%")
                    ->orWhere('suggestions.status', "%{$search_query}%");
                })->latest()->get();

        return $this->showAll($suggestions);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/admin/suggestions",
     *      operationId="postAdminSuggestion",
     *      tags={"Admin"},
     *      summary="PostAdminSuggestions",
     *      description="postAdminSuggestions",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/SuggestionCreateFormRequest")
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
    public function store(SuggestionCreateFormRequest $request)
    {
        return $this->showOne(Suggestion::create($request->validated()));
    }

    /**
     * @OA\Get(
     *      path="/api/v1/admin/suggestions/{id}",
     *      operationId="showAdminSuggestions",
     *      tags={"Admin"},
     *      summary="showAdminsuggestion",
     *      description="showAdminsuggestion",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="suggestion ID",
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
    public function show(Suggestion $suggestion)
    {
        return $this->showOne($suggestion);
    }
}
