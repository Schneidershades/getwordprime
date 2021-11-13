<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Suggestion;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SuggestionCreateFormRequest;

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
        return $this->showAll(Suggestion::latest()->get());
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
