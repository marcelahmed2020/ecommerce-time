<html lang="en">
<head>
    <title>{{$settings->site_name}}</title>
</head>
<body>
 <h3>  Dear {{$messageData['name']}}</h3>
 <h3>  Email {{$messageData['email']}}</h3>
 <p>  Your Account Has Been Successfully Created. </p>
 <p>
     <a href="{{route('account.confirm.email',$messageData['code'])}}">Confirm Account</a> </p>

 <p>Thansk & Regards</p>
 <p>{{ config('app.name') }}</p>

</body>
</html>











