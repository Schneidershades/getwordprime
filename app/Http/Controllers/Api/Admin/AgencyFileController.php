<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AgencyFileStoreFormRequest;
use App\Http\Requests\Admin\AgencyFileUpdateFormRequest;
use App\Models\AgencyFile;
use Illuminate\Database\Eloquent\Builder;

class AgencyFileController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/admin/agency-files",
     *      operationId="allAgencyFiles",
     *      tags={"Admin"},
     *      summary="Get all AgencyFile",
     *      description="Get all AgencyFile",
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

    /**
     * @OA\Post(
     *      path="/api/v1/admin/agency-files",
     *      operationId="postAgencyFiles",
     *      tags={"Admin"},
     *      summary="Post new AgencyFile",
     *      description="Post new AgencyFile",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/AgencyFileStoreFormRequest")
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
    public function store(AgencyFileStoreFormRequest $request)
    {
        return $this->showOne(AgencyFile::create($request->validated()));
    }

    /**
     * @OA\Get(
     *      path="/api/v1/admin/agency-files/{id}",
     *      operationId="showAgencyFile",
     *      tags={"Admin"},
     *      summary="Show an AgencyFile",
     *      description="Show an AgencyFile",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="AgencyFile ID",
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
        return $this->showOne(AgencyFile::find($id));
    }

    /**
     * @OA\Put(
     *      path="/api/v1/admin/agency-files/{id}",
     *      operationId="AgencyFileUpdate",
     *      tags={"Admin"},
     *      summary="Update an AgencyFile",
     *      description="Update an AgencyFile",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="AgencyFile ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/AgencyFileUpdateFormRequest")
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
    public function update(AgencyFileUpdateFormRequest $request, $id)
    {
        AgencyFile::find($id)->update($request->validated());

        return $this->showOne(AgencyFile::find($id));
    }

    /**
     * @OA\Delete(
     *      path="/api/v1/admin/agency-files/{id}",
     *      operationId="deleteAgencyFile",
     *      tags={"Admin"},
     *      summary="Delete an AgencyFile",
     *      description="Delete an AgencyFile",
     *
     *      @OA\Parameter(
     *          name="id",
     *          description="AgencyFile ID",
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
    public function destroy(AgencyFile $agencyFile)
    {
        $agencyFile->delete();

        return $this->showMessage('deleted');
    }
}
