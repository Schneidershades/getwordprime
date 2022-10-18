<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Tone;

class ToneController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/tones",
     *      operationId="allUserTones",
     *      tags={"user"},
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
