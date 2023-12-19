<x-mail::message>
# Hello you have  amessage

<h3>name:{{$details['name']}}</h3>
<h3>Email:{{$details['email']}}</h3>
<h3>phone:{{$details['phone']}}</h3>
<h3>message:{{$details['message']}}</h3>


<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
