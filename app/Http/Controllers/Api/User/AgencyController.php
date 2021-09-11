<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Agency;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AgencyCreateFormRequest;
use App\Http\Requests\User\AgencyUpdateFormRequest;

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
        return $this->showAll(auth()->user()->agencies);
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
    public function store(AgencyCreateFormRequest $request)
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
    public function show($id)
    {
        return $this->showOne(auth()->user()->agencies->where('id', $id)->first());
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
    
    public function update(AgencyUpdateFormRequest $request, $id)
    {
        auth()->user()->agencies->where('id', $id)->first()->update($request->validated());
        return $this->showOne(auth()->user()->agencies->where('id', $id)->first());
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
