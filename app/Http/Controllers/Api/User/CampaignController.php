<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Campaign;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CampaignCreateFormRequest;
use App\Http\Requests\User\CampaignUpdateFormRequest;

class CampaignController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/campaigns",
    *      operationId="allCampaign",
    *      tags={"user"},
    *      summary="allCampaign",
    *      description="allCampaign",
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
        return $this->showAll(auth()->user()->campaigns);
    }

    /**
    * @OA\Post(
    *      path="/api/v1/campaigns",
    *      operationId="postCampaigns",
    *      tags={"user"},
    *      summary="Post new campaigns",
    *      description="Post new campaigns",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/CampaignCreateFormRequest")
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
    public function store(CampaignCreateFormRequest $request)
    {
        return $this->showOne(auth()->user()->campaigns()->create($request->validated()));
    }
    /**
    * @OA\Get(
    *      path="/api/v1/campaigns/{id}",
    *      operationId="showCampaign",
    *      tags={"user"},
    *      summary="Show an campaign",
    *      description="Show an campaign",
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
    public function show(Campaign $campaign)
    {
        return $this->showOne($campaign);
    }
    /**
    * @OA\PUT(
    *      path="/api/v1/campaigns/{id}",
    *      operationId="updateCampaign",
    *      tags={"user"},
    *      summary="Update an campaign",
    *      description="Update an campaign",
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
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/CampaignUpdateFormRequest")
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
    public function update(CampaignUpdateFormRequest $request, Campaign $campaign)
    {
        auth()->user()->campaigns->where('id', $campaign->id)
            ->first()
            ->update($request->validated());
        return $this->showOne(auth()->user()->campaigns->where('id', $campaign->id)->first());
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/campaigns/{id}",
    *      operationId="deleteAgency",
    *      tags={"user"},
    *      summary="Delete an campaign",
    *      description="Delete an campaign",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Campaign ID",
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
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return $this->showMessage('deleted');
    }
}
