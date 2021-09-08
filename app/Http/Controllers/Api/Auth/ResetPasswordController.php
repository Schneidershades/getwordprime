<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
Use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

     /**
    * @OA\Post(
    *      path="/api/v1/user/password/reset",
    *      operationId="resetPasswordFromToken",
    *      tags={"authentication"},
    *      summary="reset a registered user password",
    *      description="Returns a registered user reset email",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ResetPasswordRequest")
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
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    * )
    */

    protected function sendResetResponse(Request $request, $response)
    {
        return $this->successResponse(trans($response));
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return $this->errorResponse(trans($response), 422);
    }
}
