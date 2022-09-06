@component('mail::message')

![WordPrime](https://dev-convert-script.netlify.app/img/Logo.c0abf694.svg)


# Welcome {{ $user->first_name }} {{ $user->last_name }},

We're so happy and excited to welcome you to the board.


Please find below the login details of your WordPrime AI Writer account.


Please use the details given below to log in.<br>
Email: {{$user->email}}<br>

Password: {{$password}} <br>

Login URL: https://app.onecopy.ai/login <br>

 

In case of any queries, please get in touch with the WordPrime support.

 

Thank you,
To Your Success,<br>
[WordPrime Team](http://wordprime.ai/)<br>

{{ config('app.name') }}
@endcomponent
