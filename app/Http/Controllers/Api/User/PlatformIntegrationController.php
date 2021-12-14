<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Models\PlatformIntegration;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\PlatformIntegrationStoreFormRequest;
use App\Http\Requests\User\PlatformIntegrationUpdateFormRequest;

class PlatformIntegrationController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/platform-integrations",
    *      operationId="allPlatformIntegrations",
    *      tags={"user"},
    *      summary="Get all PlatformIntegrations",
    *      description="Get all PlatformIntegrations",
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
        return $this->showAll(PlatformIntegration::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/platform-integrations",
    *      operationId="postPlatformIntegrations",
    *      tags={"user"},
    *      summary="postPlatformIntegrations",
    *      description="postPlatformIntegrations",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/PlatformIntegrationStoreFormRequest")
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
    public function store(PlatformIntegrationStoreFormRequest $request)
    {
        return $this->showOne(auth()->user()->platformIntegrations()->create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/platform-integrations/{id}",
    *      operationId="showPlatformIntegration",
    *      tags={"user"},
    *      summary="Show  PlatformIntegrations",
    *      description="Show  PlatformIntegrations",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="PlatformIntegration ID",
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
        return $this->showOne(PlatformIntegration::find($id));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/platform-integrations/{id}",
    *      operationId="PlatformIntegrationUpdate",
    *      tags={"user"},
    *      summary="Update PlatformIntegrations",
    *      description="Update PlatformIntegrations",
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
    *          @OA\JsonContent(ref="#/components/schemas/PlatformIntegrationUpdateFormRequest")
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
    
    public function update(PlatformIntegrationUpdateFormRequest $request, $id)
    {
        PlatformIntegration::find($id)->update($request->validated());
        return $this->showOne(PlatformIntegration::find($id));
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/platform-integrations/{id}",
    *      operationId="deletePlatformIntegration",
    *      tags={"user"},
    *      summary="Delete PlatformIntegrations",
    *      description="Delete PlatformIntegrations",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="PlatformIntegration ID",
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
    public function destroy(PlatformIntegration $bonus)
    {
        $bonus->delete();
        return $this->showMessage('deleted');
    }
}
