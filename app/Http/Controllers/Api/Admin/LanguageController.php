<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Language;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLanguageRequest;
use App\Http\Requests\Admin\UpdateLanguageRequest;

class LanguageController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/languages",
    *      operationId="allLanguages",
    *      tags={"Admin"},
    *      summary="Get languages",
    *      description="Get languages",
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
        return $this->showAll(Language::latest()->get());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/languages",
    *      operationId="postLanguages",
    *      tags={"Admin"},
    *      summary="Post languages",
    *      description="Post languages",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/StoreLanguageRequest")
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
    public function store(StoreLanguageRequest $request)
    {
        return $this->showOne(Language::create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/languages/{id}",
    *      operationId="showLanguages",
    *      tags={"Admin"},
    *      summary="Show languages",
    *      description="Show languages",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Language ID",
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
    public function show(Language $language)
    {
        return $this->showOne($language);
    }

    /**
    * @OA\Put(
    *      path="/api/v1/admin/languages/{id}",
    *      operationId="adminLanguages",
    *      tags={"Admin"},
    *      summary="Update languages",
    *      description="Update languages",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="role ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/UpdateLanguageRequest")
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
    
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $language->update($request->validated());
        return $this->showOne($language);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/admin/languages/{id}",
    *      operationId="deleteLanguages",
    *      tags={"Admin"},
    *      summary="Delete languages",
    *      description="Delete languages",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="script-type ID",
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
    public function destroy(Language $language)
    {
        $language->delete();
        return $this->showMessage('deleted');
    }
}
