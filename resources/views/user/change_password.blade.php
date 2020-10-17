@section('site_name','Change Password')
@include('user.layout.head')
<div class="register-area ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                <div class="login">
                    <div class="login-form-container">
                        <div class="login-form">
                                <form action="{{ route('user.change_password',$user->id) }}"   method="post" class="form-horizontal" id="login_validation" >
                                    @csrf
                                    {{  method_field('PUT')  }}

                                    <input type="password"  autocomplete="off" name="password" id="password" placeholder="New Password">
                                <input type="password"  autocomplete="off" name="password_confirmation" id="password_confirmation" placeholder="Confirmed Password">
                                <div class="button-box">
                                    <button type="submit" class="default-btn floatright">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js_con')
    <script>
        $(function () {

            $('#login_validation').validate({
                rules: {
                    'password': {
                        required: true,
                        minlength : 8

                    },
                    'password_confirmation': {
                        required: true,
                        minlength : 8,
                        equalTo : "#password"
                    },

                },

            });
        });
    </script>

@endsection

@include('user.layout.footer')
