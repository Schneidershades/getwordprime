<?php

namespace App\Http\Controllers\Api\Auth;

use App\Events\User\ForgotPassword;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordFormRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/v1/user/password/email",
     *      operationId="sendResetMailForgotPassword",
     *      tags={"Authentication"},
     *      summary="reset a registered user password",
     *      description="Returns a registered user reset email",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ForgotPasswordFormRequest")
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
    public function forgotPassword(ForgotPasswordFormRequest $request)
    {
        $token = Str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $request['email'], 'token' => $token, 'created_at' => Carbon::now()]
        );

        $spaUrl = config('externallinks.forgot_password_url').'?email='.$request['email']."&hash=$token";

        event(new ForgotPassword($request, $spaUrl));

        return $this->showMessage('A link has been sent to your mail to rest your password');
    }
}
