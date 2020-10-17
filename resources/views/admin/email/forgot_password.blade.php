@component('mail::message')
# Introduction
<h3>Hi {{ $data['email'] }}</h3>
So, You Can Change Password Right Now .


@component('mail::button', ['url' => url('/admin/password-reset/'.$data['token'])])
Change Password
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
