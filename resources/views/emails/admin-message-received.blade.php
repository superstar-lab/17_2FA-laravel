@component('mail::message')
# GCbuying

Hello, Admin

You have received a message from {{$user->name}}

@component('mail::button', ['url' => url('/admin/users/'.$user->id.'/chat')])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
