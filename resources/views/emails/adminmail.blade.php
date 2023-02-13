@component('mail::message')
# GCBUYING

Hi Admin

A new Trade Order Has been placed







@component('mail::button', ['url' => route('admin.orders.show',$content->id)])
Check Your Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
