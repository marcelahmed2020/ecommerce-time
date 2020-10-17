@section('site_name','Register')
@section('meta_desc',$settings->description)

@extends('user.layout.__app')
@section('content')
<div class="checkout-area ptb-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="coupon-accordion">
                    <!-- ACCORDION START -->
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                            <form action="#">
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text">
                                </p>
                                <p class="form-row-last">
                                    <label>Password  <span class="required">*</span></label>
                                    <input type="text">
                                </p>
                                <p class="form-row">
                                    <input type="submit" value="Login">
                                    <label>
                                        <input type="checkbox">
                                        Remember me
                                    </label>
                                </p>
                                <p class="lost-password">
                                    <a href="#">Lost your password?</a>
                                </p>
                            </form>
                        </div>
                    </div>
                    <!-- ACCORDION END -->
                    <!-- ACCORDION START -->

                    <!-- ACCORDION END -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <form  method="post" class="form-horizontal" id="register_validation" action="{{route('user.do_register')}}">
                    @csrf                    <div class="checkbox-form">
                        <h4>Your personal information</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="country-select">
                                    <label>Title <span class="required">*</span></label>
                                    <select  name="title">
                                        <option value="">-</option>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="first_name">First Name <span class="required">*</span></label>
                                    <input type="text"   name="first_name" id="first_name" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="last_name">Last Name <span class="required">*</span></label>
                                    <input type="text"  id="last_name" name="last_name" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Email">
                                </div>
                            </div>
                                <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
                                </div>
                            </div>
                                <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="birth">Age</label>
                                    <input type="number"  name="birth" id="Birth" placeholder="Date of Birth">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="country-select">
                                    <label for="country">Country <span class="required">*</span></label>
                                    <select id="country" name="country">
                                        <option value="">-</option>

                                        @foreach($countries as $coun)
                                            <option value="{{$coun->name}}">{{$coun->name}}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="address">Address <span class="required">*</span></label>
                                    <input type="text" placeholder="Street address"   id="address" name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="city">Town / City <span class="required">*</span></label>
                                    <input type="text" placeholder="City"   id="city" name="city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="state">State <span class="required">*</span></label>
                                    <input type="text" placeholder="State"   id="state" name="state">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="postcode">Postcode / Zip <span class="required">*</span></label>
                                    <input type="text"  name="zip" id="postcode" placeholder="Zip / Postal Code">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="phone1">Phone  <span class="required">*</span></label>
                                    <input type="text" name="phone1" id="phone1" placeholder="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="phone2">Phone  <span class="required">Option*</span></label>
                                    <input type="text" name="phone2" id="phone2" placeholder="Phone Option ">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="order-button-payment">
                                    <input type="submit" value="Create an account?">
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
            @if(carts()->count() > 0)

            <div class="col-lg-6 col-md-12 col-12">
                <div class="your-order">
                    <h3>Your Cart</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-total">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total = 0;
                                $quant = 0;
                              @endphp
                            @foreach(carts() as $cart)
                            <tr class="cart_item">
                                <td class="product-name">
                                    {{$cart->title}} <strong class="product-quantity"> × {{$cart->quantity}}</strong>
                                </td>
                                <td class="product-total">
                                    <span class="amount">$ {{$cart->price}}</span>
                                </td>
                            </tr>
                                @php
                                    $total  +=   $cart->price * $cart->quantity ;
                                    $quant   +=  $cart->quantity ;

                                @endphp
                            @endforeach
                            <tr class="cart_item">
                                <td class="product-name">
                                    Vestibulum dictum magna	<strong class="product-quantity"> × 1{{$quant}}</strong>
                                </td>
                                <td class="product-total">
                                    <span class="amount">$ {{$total}}</span>
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>

                            <tr class="order-total">
                                <th>Cart Total</th>
                                <td><strong><span class="amount">$ {{$total}}</span></strong>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
          @endif
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
                    'password': {
                        required: true,
                        minlength: 6
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
