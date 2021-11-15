<?php

namespace App\Http\Controllers\Api\Admin;


use App\Models\ThirdPartyPlatform;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ThirdPartyPlatformStoreFormRequest;
use App\Http\Requests\Admin\ThirdPartyPlatformUpdateFormRequest;

class ThirdPartyPlatformController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/third-party-platforms",
    *      operationId="allThirdPartyPlatforms",
    *      tags={"user"},
    *      summary="Get all thirdPartyPlatformes",
    *      description="Get all thirdPartyPlatformes",
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
        return $this->showAll(ThirdPartyPlatform::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/third-party-platforms",
    *      operationId="postThirdPartyPlatforms",
    *      tags={"user"},
    *      summary="Post new thirdPartyPlatformes",
    *      description="Post new thirdPartyPlatformes",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ThirdPartyPlatformStoreFormRequest")
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
    public function store(ThirdPartyPlatformStoreFormRequest $request)
    {
        return $this->showOne(ThirdPartyPlatform::create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/third-party-platforms/{id}",
    *      operationId="showThirdPartyPlatform",
    *      tags={"user"},
    *      summary="Show an thirdPartyPlatform",
    *      description="Show an thirdPartyPlatform",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ThirdPartyPlatform ID",
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
        return $this->showOne(ThirdPartyPlatform::find($id));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/admin/third-party-platforms/{id}",
    *      operationId="ThirdPartyPlatformUpdate",
    *      tags={"user"},
    *      summary="Update an thirdPartyPlatform",
    *      description="Update an thirdPartyPlatform",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="thirdPartyPlatform ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ThirdPartyPlatformUpdateFormRequest")
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
    
    public function update(ThirdPartyPlatformUpdateFormRequest $request, $id)
    {
        ThirdPartyPlatform::find($id)->update($request->validated());
        return $this->showOne(ThirdPartyPlatform::find($id));
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/admin/third-party-platforms/{id}",
    *      operationId="deleteThirdPartyPlatform",
    *      tags={"user"},
    *      summary="Delete an thirdPartyPlatform",
    *      description="Delete an thirdPartyPlatform",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ThirdPartyPlatform ID",
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
    public function destroy(ThirdPartyPlatform $thirdPartyPlatform)
    {
        $thirdPartyPlatform->delete();
        return $this->showMessage('deleted');
    }
}
