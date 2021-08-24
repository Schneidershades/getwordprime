<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;

class AttributeController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/attributes",
    *      operationId="allAttributes",
    *      tags={"Admin"},
    *      summary="Get Attributes",
    *      description="Get Attributes",
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
        $this->showAll(Attributes::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/attributes",
    *      operationId="postAttributes",
    *      tags={"Admin"},
    *      summary="Post attributes",
    *      description="Post attributes",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/AttributeCreateFormRequest")
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
        return $this->showOne(Attribute::create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/attributes/{id}",
    *      operationId="showAttributes",
    *      tags={"Admin"},
    *      summary="Show attribute",
    *      description="Show attribute",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Attributes ID",
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
    public function show(Attribute $attribute)
    {
        return $this->showOne(Attribute::findOrFail($id));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/admin/attributes/{id}",
    *      operationId="updateAttributes",
    *      tags={"Admin"},
    *      summary="Update attribute",
    *      description="Update attribute",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="attribute ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/AttributeUpdateFormRequest")
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
    
    public function update(AttributesUpdateFormRequest $request, Attribute $attribute)
    {
        return $this->showOne($attribute->update($request->validated()));
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/admin/attributes/{id}",
    *      operationId="deleteAttributes",
    *      tags={"Admin"},
    *      summary="Delete attribute",
    *      description="Delete attribute",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Attributes ID",
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
    public function destroy(Attributes $attribute)
    {
        $attribute->delete();
        return $this->showMessage('deleted');
    }
}
