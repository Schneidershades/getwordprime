<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\AgencyFile;
use Illuminate\Database\Eloquent\Builder;

class AgencyFileController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/agency-files",
     *      operationId="userAgencyFile",
     *      tags={"user"},
     *      summary="Get all userAgencyFile",
     *      description="Get all userAgencyFile",
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
        $search_query = request()->get('search') ? request()->get('search') : null;

        $agencyFile = AgencyFile::query()
                ->selectRaw('agency_files.*')
                ->when($search_query, function (Builder $builder, $search_query) {
                    $builder->where('agency_files.name', 'LIKE', "%{$search_query}%")
                    ->where('agency_files.description', 'LIKE', "%{$search_query}%")
                    ->where('agency_files.url', 'LIKE', "%{$search_query}%");
                })->latest()->get();

        return $this->showAll($agencyFile);
    }
}
