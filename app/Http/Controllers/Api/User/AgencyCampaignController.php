<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Support\Str;
use App\Models\AgencyCampaign;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AgencyCampaignCreateFormRequest;
use App\Http\Requests\User\AgencyCampaignUpdateFormRequest;

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
    *      path="/api/v1/agency/{agency_id}/campaign",
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
     *          name="agency_id",
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
    public function store(AgencyCampaignCreateFormRequest $request, $id)
    {
        $agency = auth()->user()->agencyCampaigns()->create(array_merge($request->validated(), ['link' => Str::random(40)]));
        return $this->showOne($agency);
    }

    /**
    * @OA\Get(
    *      path="/api/v1/agency/{agency_id}/campaign",
    *      operationId="showAgencyCampaign",
    *      tags={"user"},
    *      summary="Show an agency",
    *      description="Show an agency",
     *      @OA\Parameter(
     *          name="agency_id",
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
    public function show($agency_id)
    {
        return $this->showAll(auth()->user()->agencyCampaigns->where('agency_id', $agency_id)->get());
    }

    /**
    * @OA\Put(
    *      path="/api/v1/agency/{agency_id}/campaign",
    *      operationId="AgencyUpdateAgencyCampaign",
    *      tags={"user"},
    *      summary="Update an agency campaign",
    *      description="Update an agency campaign",
    *      @OA\Parameter(
    *          name="agency_id",
    *          description="Agency ID",
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
    
    public function update(AgencyCampaignUpdateFormRequest $request, $agency_id)
    {
        auth()->user()->agencyCampaigns->where('agency_id', $agency_id)->first()->update($request->validated());

        $campaigns = auth()->user()->agencyCampaigns->where('agency_id', $agency_id)->first();

        return $this->showOne($campaigns);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/agency/{id}/campaign/{id}",
    *      operationId="deleteAgencyCampaign",
    *      tags={"user"},
    *      summary="Delete an agency campaign",
    *      description="Delete an agency campaign",
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
    public function destroy(AgencyCampaign $agency)
    {
        $agency->delete();
        return $this->showMessage('deleted');
    }
}
