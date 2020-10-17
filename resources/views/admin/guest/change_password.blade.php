<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>{{sitesetting()->site_name}}| LogIn</title>

  <!-- S images -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{url('/frontend')}}/assets/images/logos/icon.jpeg">
  <link rel="icon" type="image/png" sizes="32x32" href="{{url('/frontend')}}/assets/images/logos/icon.jpeg">
  <link rel="icon" type="image/png" sizes="16x16" href="{{url('/frontend')}}/assets/images/logos/icon.jpeg">
  <link rel="icon" type="image/ico" href="favicon.ico" />

    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ url('backend/style.css')  }}">
    @toastr_css

</head>
<body>
  @include('sweetalert::alert')
  @include('partials._errors')
 <!-- partial:index.partial.html -->
<div id="login-button">
  <img src="{{ url('backend/loging_desighn/login-w-icon.png')}} ">
  </img>
</div>
<div id="container">
  <h5 style="margin: 42px auto;font-size: 24px;text-align: center;">Change Password</h5>
  <span class="close-btn">
    <img    src="{{ url('backend/loging_desighn/circle_close_delete_-128.png')}}"></img>
  </span>

   <form action="{{ route('admin.change_password',$user->id) }}" method="post">
          @csrf
          {{  method_field('PUT')  }}
     <input type="password" name="password" required class="form-control" placeholder="New Password">
    <input  type="password" name="password_confirmation" required class="form-control" placeholder="Confirmed Password">
     <button class="btn_lo" type="submit">Update</button>
</form>
</div>


<!-- partial -->
<script src="{{  url('backend/loging_desighn/TweenMax.min.js') }}"></script>
<script src="{{  url('backend/loging_desighn/jquery.min.js') }}"></script>
<script  src="{{ url('backend/script.js')  }}"></script>
  @toastr_js
  @toastr_render
</body>
</html>
