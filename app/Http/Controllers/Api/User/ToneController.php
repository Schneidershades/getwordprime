<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Tone;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreToneRequest;
use App\Http\Requests\Admin\UpdateToneRequest;

class ToneController extends Controller
{
     /**
    * @OA\Get(
    *      path="/api/v1/tones",
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
        return $this->showAll(Tone::latest()->get());
    }
}
