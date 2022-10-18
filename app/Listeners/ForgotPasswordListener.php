<?php

namespace App\Listeners;

use App\Events\User\ForgotPassword;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\User\ForgotPassword  $event
     * @return void
     */
    public function handle(ForgotPassword $event)
    {
        $details = $event->detail;
        $link = $event->link;

        Mail::to($details['email'])->send(new \App\Mail\ForgetPasswordEmail($details, $link));
    }
}
