<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suggestion;

class SuggestionController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/admin/suggestion",
    *      operationId="allSuggestion",
    *      tags={"admin"},
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
        return $this->showAll(Suggestion::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/admin/suggestions",
    *      operationId="postAgencies",
    *      tags={"tutorial"},
    *      summary="Post suggestions",
    *      description="Post suggestions",
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
        return $this->showOne(auth()->user()->suggesions()->create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/suggestions/{id}",
    *      operationId="showAdminSuggestion",
    *      tags={"tutorial"},
    *      summary="Show suggestion",
    *      description="Show suggestion",
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
        return $this->showOne($suggesion);
    }
}
