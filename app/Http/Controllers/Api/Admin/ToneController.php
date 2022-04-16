<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Tone;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\Admin\StoreToneRequest;
use App\Http\Requests\Admin\UpdateToneRequest;

class ToneController extends Controller
{
     /**
    * @OA\Get(
    *      path="/api/v1/admin/tones",
    *      operationId="allTones",
    *      tags={"Admin"},
    *      summary="Get tones",
    *      description="Get tones",
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
        
        $script_types =  Tone::query()
                ->selectRaw('tones.*')
                ->when($search_query, function (Builder $builder, $search_query) {
                    $builder->where('tones.name', 'LIKE', "%{$search_query}%");
                })->latest()->get();

        return $this->showAll($script_types);
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/tones",
    *      operationId="postTones",
    *      tags={"Admin"},
    *      summary="Post tones",
    *      description="Post tones",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/StoreToneRequest")
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
    public function store(StoreToneRequest $request)
    {
        return $this->showOne(Tone::create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/tones/{id}",
    *      operationId="showTones",
    *      tags={"Admin"},
    *      summary="Show tones",
    *      description="Show tones",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Tone ID",
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
    public function show(Tone $tone)
    {
        return $this->showOne($tone);
    }

    /**
    * @OA\Put(
    *      path="/api/v1/admin/tones/{id}",
    *      operationId="adminTones",
    *      tags={"Admin"},
    *      summary="Update tones",
    *      description="Update tones",
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
    *          @OA\JsonContent(ref="#/components/schemas/UpdateToneRequest")
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
    
    public function update(UpdateToneRequest $request, Tone $tone)
    {
        $tone->update($request->validated());
        return $this->showOne($tone);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/admin/tones/{id}",
    *      operationId="deleteTones",
    *      tags={"Admin"},
    *      summary="Delete tones",
    *      description="Delete tones",
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
    public function destroy(Tone $tone)
    {
        $tone->delete();
        return $this->showMessage('deleted');
    }
}
