<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SuggestionCreateFormRequest;

class SuggestionController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/suggestions",
    *      operationId="allSuggestions",
    *      tags={"script"},
    *      summary="allSuggestions",
    *      description="allSuggestions",
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

    public function store(SuggestionCreateFormRequest $request)
    {
        return $this->showOne(auth()->user()->suggestions->create($request->validated()));
    }
    
    /**
    * @OA\Get(
    *      path="/api/v1/suggestions/{id}",
    *      operationId="showSuggestions",
    *      tags={"script"},
    *      summary="showSuggestions",
    *      description="showSuggestions",
    *      
    *      @OA\Parameter(
    *          name="id",
    *          description="Suggesstion ID",
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
