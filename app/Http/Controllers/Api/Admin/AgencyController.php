<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Agency;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AgencyCreateFormRequest;
use App\Http\Requests\User\AgencyUpdateFormRequest;

class AgencyController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/agencies",
    *      operationId="allAgencys",
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
        return $this->showAll(Agency::latest()->get());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/agencies",
    *      operationId="postAgencys",
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
    *      operationId="updateAgencys",
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
    *      operationId="deleteAgencys",
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
