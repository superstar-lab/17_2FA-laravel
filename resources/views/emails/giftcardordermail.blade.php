@component('mail::message')
# GCBUYING

Hi {{$content->user->name}}

Your Giftcard Order Has been {{($content->status == 'Pending') ? 'Placed' : $content->status}}

{{($content->comment != null) ? $content->comment : ''}}


@component('mail::button', ['url' => route('giftcard.show',$content->id)])
Check Your Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
