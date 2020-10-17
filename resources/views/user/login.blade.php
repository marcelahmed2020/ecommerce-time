 @section('site_name','Login')
 @section('meta_desc',$settings->description)

@extends('user.layout.__app')
@section('content')
         <div class="register-area ptb-80">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                         <div class="login">
                             <div class="login-form-container">
                                 <div class="login-form">
                                     <form  method="post" class="form-horizontal" id="login_validation" action="{{route('user.do_login')}}">
                                         @csrf
                                         <input type="email" name="email" id="email" placeholder="Email Address" autocomplete="off">
                                         <input type="password"  autocomplete="off" name="password" id="password" placeholder="Password">

                                         <div class="button-box">
                                             <div class="login-toggle-btn">

                                                 <a href="{{route('user.forgetpass')}}">Forgot Password?</a>
                                             </div>
                                             <button type="submit" class="default-btn floatright">Login</button>
                                         </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

@section('js_content')
    <script>
        $(function () {

            $('#login_validation').validate({
                rules: {
                    'email': {
                        required: true,
                        email: true
                    },
                    'password': {
                        required: true,                    },

                },

            });
        });
    </script>
    @endsection
@endsection
