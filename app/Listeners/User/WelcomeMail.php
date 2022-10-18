<?php

namespace App\Listeners\User;

use App\Mail\User\UserWelcomeMail;
use Illuminate\Support\Facades\Mail;

class WelcomeMail
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user->email)->send(new UserWelcomeMail($event->user, $event->password));
    }
}
