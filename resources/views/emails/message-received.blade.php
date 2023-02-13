@component('mail::message')
# GCBUYING

Hi {{$user->name}}

You got a new message

@component('mail::button', ['url' => url('/chat')])
Check Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
