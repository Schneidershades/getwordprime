@component('mail::message')


![OneCopy](https://dev-convert-script.netlify.app/img/Logo.c0abf694.svg)



<!-- Message start -->

# Welcome {{ $user->first_name }} {{ $user->last_name }},

We're so happy and excited to welcome you to the board.


Please find below the login details of your OneCopy AI Writer account.


Please use the details given below to log in.
Email: {{$user->email}}
Password: ********
Login URL: https://app.onecopy.ai/login

 

In case of any queries, please get in touch with the OneCopy support.

 

Thank you,
To Your Success,<br>
[OneCopy Team](http://onecopy.ai/)<br>

{{ config('app.name') }}
@endcomponent
