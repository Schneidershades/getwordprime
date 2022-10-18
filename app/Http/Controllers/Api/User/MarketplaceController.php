<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\FreelancerAd;
use App\Models\FreelancerKeyword;
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
        $freelancer = new FreelancerApi;
        $keyword = FreelancerKeyword::first();

        // return $freelancer->contentWritingJobs();
        // return $freelancer->search('copywrting');
        // return $freelancer->projects('copywrting');

        foreach ($freelancer->projects($keyword->words)->result->projects as $project) {
            if ($project->currency->country == 'US') {
                $item = FreelancerAd::where('project_id', $project->id)->first();

                if ($item == null) {
                    $item = new FreelancerAd;
                    $item->project_id = $project->id;
                    $item->title = $project->title;
                    $item->type = ucfirst($project->type);
                    $item->short_description = strip_tags($project->preview_description);
                    $item->full_description = strip_tags($project->description);
                    $item->date = ($project->time_submitted);
                    $item->bids = $project->bid_stats->bid_count;
                    $item->status = $project->frontend_project_status;
                    $item->bid_count = $project->bid_stats->bid_count;
                    $item->bid_avg = optional($project->bid_stats)->bid_avg;
                    $item->budget_type = $project->type;
                    $item->budget_low = round($project->budget->minimum * $project->currency->exchange_rate);
                    $item->budget_high = optional($project->budget)->maximum ? round($project->budget->maximum * $project->currency->exchange_rate) : 0;
                    $item->url = 'http://www.freelancer.com/projects/'.$project->seo_url;
                    $item->currency_id = $project->currency->id;
                    $item->city = $project?->location?->city;
                    $item->currency_code = $project->currency->code;
                    $item->currency_sign = $project->currency->sign;
                    $item->currency_name = $project->currency->name;
                    $item->currency_exchange_rate = $project->currency->exchange_rate;
                    $item->currency_country = $project->currency->country;
                    $item->currency_is_escrowcom_supported = $project->currency->is_escrowcom_supported;
                    $item->hourly_commitment = optional(optional(optional($project)->hourly_project_info)->commitment)->hours;
                    $item->hourly_interval = optional(optional(optional($project)->hourly_project_info)->commitment)->interval;
                    $item->save();
                }
            }
        }

        return $this->showAll(FreelancerAd::latest()->get());
    }
}
