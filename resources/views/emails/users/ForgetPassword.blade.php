@component('mail::message')


![WordPrime](https://dev-convert-script.netlify.app/img/Logo.c0abf694.svg)


# Welcome {{ $user->first_name }} {{ $user->last_name }},

We're so happy and excited to welcome you to the board.


You requested a password reset. Click on the button below to create a new password


@component('mail::button', ['url' => $link])
Set a new password
@endcomponent 

 

In case of any queries, please get in touch with the wordprime support.

 

Thank you,
To Your Success,<br>
[WordPrime Team](http://wordprime.ai/)<br>

{{ config('app.name') }}
@endcomponent
