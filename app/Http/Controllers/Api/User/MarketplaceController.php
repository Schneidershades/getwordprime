<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Traits\Plugins\FreelancerApi;

class MarketplaceController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/marketplace",
    *      operationId="userMarketplace",
    *      tags={"user"},
    *      summary="userMarketplace",
    *      description="userMarketplace",
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
        $projects = [];

        $freelancer = new FreelancerApi;  
        
        // return $freelancer->projects()->result->projects;

        foreach($freelancer->projects()->result->projects as $project){
            if($project->currency->country == "US"){
                $projects[] = array(
                    'title'=>$project->title,
                    'type'=>ucfirst($project->type),
                    'short_description'=>strip_tags($project->preview_description),
                    'full_description'=>strip_tags($project->description),
                    'date'=> ($project->time_submitted),
                    'bids'=> $project->bid_stats->bid_count,
                    'status'=> $project->frontend_project_status,
                    "bid_count" => $project->bid_stats->bid_count,
                    "bid_avg" => optional($project->bid_stats)->bid_avg,
                    'budget_type' => $project->type,
                    'budget_low'=> round($project->budget->minimum * $project->currency->exchange_rate),
                    'budget_high'=> round($project->budget->maximum * $project->currency->exchange_rate),
                    'url'=> 'http://www.freelancer.com/projects/'.$project->seo_url,
                    'currency_id' => $project->currency->id,
                    'currency_code' => $project->currency->code,
                    'currency_sign' => $project->currency->sign,
                    'currency_name' => $project->currency->name,
                    'currency_exchange_rate' => $project->currency->exchange_rate,
                    'currency_country' => $project->currency->country,
                    'currency_is_escrowcom_supported' => $project->currency->is_escrowcom_supported,
                    'hourly_commitment' => optional(optional(optional($project)->hourly_project_info)->commitment)->hours,
                    'hourly_interval' => optional(optional(optional($project)->hourly_project_info)->commitment)->interval,
                );
            }
        }

        return $projects;

        // return $freelancer->contentWritingJobs();
    }
}
