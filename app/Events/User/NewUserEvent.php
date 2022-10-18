<?php

namespace App\Events\User;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewUserEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $password;

    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }
}
