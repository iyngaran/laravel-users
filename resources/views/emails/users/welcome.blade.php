@component('mail::message')
Hello {{$user->first_name}},

Welcome to {{ config('app.name') }}. We’re thrilled to see you here!

{{ config('app.name') }} is a website where you can buy and sell almost everything.
The best deals are often done with people who live in your own city or on your own street,
so on {{ config('app.name') }} it's easy to buy and sell locally.

Get to know us in our <a href="https://youtu.be/HcNsGqA6YSc">Intro video</a>.
You’ll be guided through services by our team to ensure you get the very best out of our service.

@component('mail::button', ['url' => config('app.url')])
    Visit Website
@endcomponent

See you again!,<br>
Team "{{ config('app.name') }}"
@endcomponent
