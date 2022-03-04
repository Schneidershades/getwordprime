@component('mail::message')


![Parkit](https://dev-convert-script.netlify.app/img/Logo.c0abf694.svg)



<!-- Message start -->

# Hello {{ $user->first_name }} {{ $user->last_name }},

Congratulations and thank you for choosing Onecopy for curating your content. Experience a platform like never before!


We're here to help.

If you have any questions, please [contact us](mailto:info@onecopy.ng?subject=Contact+Onecopy). Our Customer Support Team is ready to serve you.



<br>	

Thanks,<br>
Onecopy Team<br>

[www.onecopy.ai](http://onecopy.ai/)<br>

{{ config('app.name') }}
@endcomponent
