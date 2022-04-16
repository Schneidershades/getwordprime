<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Support\Str;
use App\Models\AgencyCampaign;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AgencyCampaignCreateFormRequest;

class AgencyCampaignController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/agency/{id}/campaign",
    *      operationId="allAgencyCampaign",
    *      tags={"user"},
    *      summary="Get all agencies",
    *      description="Get all agencies",
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
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
    public function index($id)
    {
        $campaigns = AgencyCampaign::where('agency_id', $id)->get();
        return $this->showAll($campaigns);
    }

    /**
    * @OA\Post(
    *      path="/api/v1/agency/{id}/campaign",
    *      operationId="postAgencyCampaign",
    *      tags={"user"},
    *      summary="Post new agencies",
    *      description="Post new agencies",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/AgencyCampaignCreateFormRequest")
    *      ),
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
    public function store(AgencyCampaignCreateFormRequest $request, $id)
    {
        $agency = auth()->user()->agencyCampaigns()->create(array_merge($request->validated(), ['link' => Str::random(40)]));
        return $this->showOne($agency);
    }

    /**
    * @OA\Get(
    *      path="/api/v1/agency/{id}/campaign/{campaign_id}",
    *      operationId="showAgencyCampaign",
    *      tags={"user"},
    *      summary="Show an agency",
    *      description="Show an agency",
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
    public function show($id)
    {
        return $this->showOne(auth()->user()->agencyCampaigns->where('id', $id)->first());
    }

    /**
    * @OA\Put(
    *      path="/api/v1/agency/{id}/campaign/{id}",
    *      operationId="AgencyUpdateAgencyCampaign",
    *      tags={"user"},
    *      summary="Update an agency",
    *      description="Update an agency",
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
    
    public function update(AgencyCampaignUpdateFormRequest $request, $id)
    {
        auth()->user()->agencyCampaigns->where('id', $id)->first()->update($request->validated());

        $agency = auth()->user()->agencyCampaigns->where('id', $id)->first();

        return $this->showOne($agency);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/agency/{id}/campaign/{id}",
    *      operationId="deleteAgencyCampaign",
    *      tags={"user"},
    *      summary="Delete an agency",
    *      description="Delete an agency",
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
    public function destroy(AgencyCampaign $agency)
    {
        $agency->delete();
        return $this->showMessage('deleted');
    }
}
