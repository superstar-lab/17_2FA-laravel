@component('mail::message')
# GCBUYING

Hi Admin

A new Giftcard Request Order Has been placed







@component('mail::button', ['url' => route('admin.cardorder.show',$content->id)])
Check Your Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
