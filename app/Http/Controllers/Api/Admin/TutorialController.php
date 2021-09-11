<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Tutorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TutorialUpdateFormRequest;

class TutorialController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/tutorials",
    *      operationId="allTutorials",
    *      tags={"Admin"},
    *      summary="Get all tutorials",
    *      description="Get all tutorials",
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
        $this->showAll(Tutorial::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/tutorials",
    *      operationId="postAgencies",
    *      tags={"Admin"},
    *      summary="Post new tutorials",
    *      description="Post new tutorials",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/TutorialCreateFormRequest")
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
    public function store(Request $request)
    {
        return $this->showOne(Tutorial::create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/tutorials/{id}",
    *      operationId="showTutorial",
    *      tags={"Admin"},
    *      summary="Show an tutorial",
    *      description="Show an tutorial",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Tutorial ID",
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
    public function show(Tutorial $tutorial)
    {
        return $this->showOne(Tutorial::findOrFail($tutorial));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/admin/tutorials/{id}",
    *      operationId="TutorialUpdate",
    *      tags={"Admin"},
    *      summary="Update an tutorial",
    *      description="Update an tutorial",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="tutorial ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/TutorialCreateFormRequest")
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
    
    public function update(TutorialUpdateFormRequest $request, Tutorial $tutorial)
    {
        return $this->showOne($tutorial->update($request->validated()));
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/admin/tutorials/{id}",
    *      operationId="deleteTutorial",
    *      tags={"Admin"},
    *      summary="Delete an tutorial",
    *      description="Delete an tutorial",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Tutorial ID",
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
    public function destroy(Tutorial $tutorial)
    {
        $tutorial->delete();
        return $this->showMessage('deleted');
    }
}
