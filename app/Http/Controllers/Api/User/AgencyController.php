<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agency;
use App\Http\Controllers\Api\User\AgencyCreateFormRequest;
use App\Http\Controllers\Api\User\AgencyUpdateFormRequest;

class AgencyController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/agencies",
    *      operationId="allAgencies",
    *      tags={"agency"},
    *      summary="Get all agencies",
    *      description="Get all agencies",
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
        $this->showAll(auth()->user()->agencies);
    }

    /**
    * @OA\Post(
    *      path="/api/v1/agencies",
    *      operationId="postAgencies",
    *      tags={"agency"},
    *      summary="Post new agencies",
    *      description="Post new agencies",
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
    public function store(Request $request)
    {
        return $this->showOne(auth()->user()->agencies()->create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/agencies/{id}",
    *      operationId="showAgency",
    *      tags={"agency"},
    *      summary="Show an agency",
    *      description="Show an agency",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Agency ID",
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
        return $this->showOne(Agency::findOrFail($id));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/agencies/{id}",
    *      operationId="AgencyUpdate",
    *      tags={"agency"},
    *      summary="Update an agency",
    *      description="Update an agency",
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
    
    public function update(AgencyUpdateFormRequest $request, Agency $agency)
    {
        return $this->showOne($agency->update($request->validated()));
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/agencies/{id}",
    *      operationId="deleteAgency",
    *      tags={"agency"},
    *      summary="Delete an agency",
    *      description="Delete an agency",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Agency ID",
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
