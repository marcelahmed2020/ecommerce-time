@section('site_name','Account')
@extends('user.layout.__app')
@section('content')
<div class="checkout-area ptb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <form  method="post" class="form-horizontal" id="register_validation" action="{{route('user.do_account',$user->id)}}">
                    @csrf
                    {{ method_field('put') }}
                    <div class="checkbox-form">
                        <h4>Your personal information</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="country-select">
                                    <label>Title <span class="required">*</span></label>
                                    <select  name="title">
                                        <option value="">-</option>
                                        <option {{$user->usersinfos->title == 'Mr.' ? 'selected':''}} value="Mr.">Mr.</option>
                                        <option {{$user->usersinfos->title == 'Mrs' ? 'selected':''}}  value="Mrs">Mrs</option>
                                        <option {{$user->usersinfos->title == 'Miss' ? 'selected':''}}  value="Miss">Miss</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="first_name">First Name <span class="required">*</span></label>
                                    <input type="text"   name="first_name" id="first_name"  value="{{$user->first_name}}"   placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="last_name">Last Name <span class="required">*</span></label>
                                    <input type="text"  id="last_name" value="{{$user->last_name}}"   name="last_name" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Email" value="{{$user->email}}"  >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="password">Password</label>
                                    <input type="password"  name="password" id="password"  value="{{old('password')}}" placeholder="Password">
                                    <input type="hidden" name="old_password"  value="{{$user->password}}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="birth">Age</label>
                                    <input type="text"  name="birth" id="birth" placeholder="Date of Birth"   value="  {{$user->usersinfos->birth}}  ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="country-select">
                                    <label for="country">Country <span class="required">*</span></label>
                                    <select id="country" name="country">
                                        <option value="">-</option>

                                        @foreach($countries as $coun)
                                            <option {{$user->usersinfos->country == $coun->id ? 'selected':''}}   value="{{$coun->id}}">{{$coun->name}}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="address">Address <span class="required">*</span></label>
                                    <input type="text" placeholder="Street address"  value="{{$user->usersinfos->address}} " id="address" name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="city">Town / City <span class="required">*</span></label>
                                    <input type="text" placeholder="City"   value="{{$user->usersinfos->city}} "  id="city" name="city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="state">State <span class="required">*</span></label>
                                    <input type="text" placeholder="State"    value="{{$user->usersinfos->state}} "  id="state" name="state">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="postcode">Postcode / Zip <span class="required">*</span></label>
                                    <input type="text"  name="zip"   value="{{ $user->usersinfos->zip}} "  id="postcode" placeholder="Zip / Postal Code">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="phone1">Phone  <span class="required">*</span></label>
                                    <input type="text" name="phone1"  value="{{ $user->usersinfos->phone1?:''}} "  id="phone1" placeholder="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="phone2">Phone  <span class="required">Option*</span></label>
                                    <input type="text" name="phone2"  value="{{ $user->usersinfos->phone2?:''}} "  id="phone2" placeholder="Phone Option ">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="order-button-payment">
                                    <input type="submit" value="Update Your an account?">
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('js_content')
    <script>
        $(function () {
            $('#register_validation').validate({
                rules: {
                    'title': {
                        required: true,
                    },
                    'first_name': {
                        required: true,
                        minlength: 2
                    },
                    'last_name': {
                        required: true,
                        minlength: 2
                    },
                    'email': {
                        required: true,
                        email: true
                    },

                    'Birth': {
                        required: true                       },
                    'country': {
                        required: true
                    },
                    'address': {
                        required: true
                    },
                    'city': {
                        required: true
                    },
                    'state': {
                        required: true
                    },
                    'postcode': {
                        required: true
                    },
                    'zip': {
                        required: true
                    },
                    'phone1': {
                        required: true
                    },
                    'birth': {
                        required: true
                    }
                },
                messages: {
                    first_name: 'This field is required',
                    last_name: 'This field is required',
                },
            });
        });
    </script>
@endsection

@endsection
