<?php

namespace App\Http\Controllers\Api\User;

use App\Models\FreelancerAd;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreMarketplaceRequest;

class MarketplaceProjectController extends Controller
{
    
    /**
    * @OA\Get(
    *      path="/api/v1/marketplace-saved",
    *      operationId="userMarketplaceSaved",
    *      tags={"user"},
    *      summary="userMarketplaceSaved",
    *      description="userMarketplaceSaved",
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
        return $this->showAll(auth()->user()->freelancerAds);
    }



    /**
    * @OA\Post(
    *      path="/api/v1/marketplace-saved",
    *      operationId="postuserMarketplacesaved",
    *      tags={"user"},
    *      summary="Post userMarketplacesaved",
    *      description="Post userMarketplacesaved",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/StoreMarketplaceRequest")
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

    public function store(StoreMarketplaceRequest $request)
    {
        auth()->user()->freelancerAds()->create($request->validated());
        return $this->showMessage('Project saved');
    }

    /**
    * @OA\Get(
    *      path="/api/v1/marketplace-saved/{id}",
    *      operationId="showMarketplacesaved",
    *      tags={"user"},
    *      summary="Show an marketplacesaved",
    *      description="Show an marketplacesaved",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="marketplace ID",
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
        return $this->showOne(FreelancerAd::find($id));
    }


     /**
    * @OA\Delete(
    *      path="/api/v1/marketplace-saved/{id}",
    *      operationId="deleteMarketplaceSaved",
    *      tags={"user"},
    *      summary="Delete a marketplace saved",
    *      description="Delete a marketplace saved",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="marketplace ID",
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
    public function destroy($id)
    {
        $project = FreelancerAd::find($id)->delete();
        return $this->showMessage('Project deleted');
    }
}
