@component('mail::message')
# GCBUYING

Hi Admin

A new Recharge Request Order Has been placed







@component('mail::button', ['url' => route('admin.rechargeorders.show',$content->id)])
Check Your Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
