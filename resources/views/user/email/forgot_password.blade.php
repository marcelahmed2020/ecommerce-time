# Introduction
<h3>Hi {{ $data['email'] }}</h3>
So, You Can Change Password Right Now .
<a href="{{url('/user/password-reset/'.$data['token'])}}">Change Password</a>
Thanks,<br>
{{ config('app.name') }}
