@section('site_name','Forgot Password')
@section('meta_desc',$settings->description)

@extends('user.layout.__app')
@section('content')
<div class="register-area ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                <div class="login">
                    <div class="login-form-container">
                        <div class="login-form">
                            <form  method="post" class="form-horizontal" id="login_validation"  action="{{ route('user.send_mail_password') }}">
                                @csrf
                                <input type="email" name="email" id="email" placeholder="Email Address" autocomplete="off">
                                <div class="button-box">
                                    <div class="login-toggle-btn">

                                        <a href="{{route('user.login')}}">Login?</a>
                                    </div>
                                    <button type="submit" class="default-btn floatright">Get new password</button>
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
                },
            });
        });
    </script>
    @endsection
@endsection
