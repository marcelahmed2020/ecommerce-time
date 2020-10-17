@section('site_name','Checkout')
@section('meta_desc',$settings->description)
@extends('user.layout.__app')
@section('content')

<div class="checkout-area">
    <div class="container">
      <div class="text-center">
             <h2 class="ptb-10">CheckOut</h2>
      </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                              <form  class="form-horizontal" id="info_validation" action="">
                    <div class="checkbox-form">
                        <h4>Billing To</h4>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_first_name">First Name <span class="required">*</span></label>
                                    <input type="text"   name="billing_first_name" id="billing_first_name"  value="{{$user->first_name}}"   placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_last_name">Last Name <span class="required">*</span></label>
                                    <input type="text"  id="billing_last_name" value="{{$user->last_name}}"   name="billing_last_name" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="billing_email">Email</label>
                                    <input type="email" name="billing_email" id="billing_email" placeholder="Email" value="{{$user->email}}"  >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="country-select">
                                    <label for="billing_country">Country <span class="required">*</span></label>
                                    <select id="billing_country" name="billing_country">
                                        <option value="">-</option>

                                        @foreach($countries as $coun)
                                            <option @if($user->usersinfos()->count() > 0)  {{$user->usersinfos->country == $coun->name ? 'selected':''}} @endif  value="{{$coun->name}}">{{$coun->name}}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_address">Address <span class="required">*</span></label>
                                    <input type="text" placeholder="Street address"  value="{{$user->usersinfos()->count() > 0 ?$user->usersinfos->address:''}}" id="billing_address" name="billing_address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_city">Town / City <span class="required">*</span></label>
                                    <input type="text" placeholder="City"   value="{{$user->usersinfos()->count() > 0 ?$user->usersinfos->city:''}}"  id="billing_city" name="billing_city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_state">State <span class="required">*</span></label>
                                    <input type="text" placeholder="State"    value="{{$user->usersinfos()->count() > 0 ?$user->usersinfos->state:''}}"  id="billing_state" name="billing_state">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_zip">Postcode / Zip <span class="required">*</span></label>
                                    <input type="text"  name="billing_zip"   value="{{$user->usersinfos()->count() > 0 ?$user->usersinfos->zip:''}}"  id="billing_zip" placeholder="Zip / Postal Code">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_phone1">Phone  <span class="required">*</span></label>
                                    <input type="text" name="billing_phone1"  value="{{$user->usersinfos()->count() > 0 ?$user->usersinfos->phone1:''}}"  id="billing_phone1" placeholder="phone">
                                </div>
                            </div>


                            <div class="col-md-12">


                                <div class="checkout-form-list">
                                    <label   for="checkbox_shipto">Billing To Shipping  </label>
                                        <input type="checkbox" name="checkbox_shipto"  id="checkbox_shipto"   class="checkbox_shipto" >
                                </div>

                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <form  method="post" id="checkout_validation" class="form-horizontal"  action="{{route('user.delivery_address')}}">
                    @csrf
                    <div class="checkbox-form">
                        <h4>Shipping To</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_first_name">First Name <span class="required">*</span></label>
                                    <input type="text"   name="ship_first_name" id="ship_first_name"   value="{{! empty($delivery_address)?$delivery_address->ship_first_name:''}}"  placeholder="Shipping First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_last_name">Last Name <span class="required">*</span></label>
                                    <input type="text"  id="ship_last_name" value="{{! empty($delivery_address)?$delivery_address->ship_last_name:''}}"  name="ship_last_name" placeholder="Shipping Last Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="ship_email">Email</label>
                                    <input type="email"  value="{{! empty($delivery_address)?$delivery_address->ship_email:''}}"   name="ship_email" id="ship_email" placeholder="Email"  >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="country-select">
                                    <label for="ship_country">Country <span class="required">*</span></label>
                                    <select id="ship_country" name="ship_country">
                                        @foreach($countries as $coun)

                                        <option value="{{$coun->name}}"
                                        @if(! empty($delivery_address))
                                            {{$delivery_address->ship_country == $coun->name ? 'selected': ''}}
                                            @endif
                                        >{{$coun->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_address">Address <span class="required">*</span></label>
                                    <input type="text"  id="ship_address" value="{{! empty($delivery_address)?$delivery_address->ship_address:''}}" name="ship_address" placeholder="Shipping Adress">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_city">Town / City <span class="required">*</span></label>
                                    <input type="text"  id="ship_city" value="{{! empty($delivery_address)?$delivery_address->ship_city:''}}"  name="ship_city" placeholder="Shipping city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_state">State <span class="required">*</span></label>
                                    <input type="text"  id="ship_state" value="{{! empty($delivery_address)?$delivery_address->ship_state:''}}"   name="ship_state" placeholder="Shipping State">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_zip">Postcode / Zip <span class="required">*</span></label>
                                    <input type="text"  name="ship_zip"  value="{{! empty($delivery_address)?$delivery_address->ship_zip:''}}" id="ship_zip" placeholder="Shipping Zip / Postal Code">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_phone1">Phone  <span class="required">*</span></label>
                                    <input type="text"  name="ship_phone1"   value="{{! empty($delivery_address)?$delivery_address->ship_phone1:''}}"  id="ship_phone1" placeholder="Shipping phone">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="order-button-payment">
                                    <input type="submit" value="Ready For CheckOut?">
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

            $('#checkout_validation').validate({
                rules: {
                   'ship_first_name': {
                        required: true,
                        minlength: 2
                    },
                    'ship_last_name': {
                        required: true,
                        minlength: 2
                    },
                    'ship_email': {
                        required: true,
                        email: true
                    } ,
                    'ship_country': {
                        required: true                       },
                    'ship_address': {
                        required: true
                    },

                    'ship_city': {
                        required: true
                    },
                    'ship_state': {
                        required: true
                    },
                    'ship_zip': {
                        required: true
                    },
                    'ship_phone1': {
                        required: true
                    }
                },
            });
       $('#checkbox_shipto').change(function () {
          var billing_first_name = $('#billing_first_name').val();
          var billing_last_name = $('#billing_last_name').val();
          var billing_email = $('#billing_email').val();
          var billing_country = $('#billing_country').val();
          var billing_address = $('#billing_address').val();
          var billing_city = $('#billing_city').val();
          var billing_state = $('#billing_state').val();
          var billing_zip = $('#billing_zip').val();
          var billing_phone1 = $('#billing_phone1').val();
           var ship_first_name  = $('#ship_first_name').val(billing_first_name);
           var ship_last_name   = $('#ship_last_name').val(billing_last_name);
           var ship_email       = $('#ship_email').val(billing_email);
           var ship_country     = $('#ship_country').val(billing_country);
           var ship_address     = $('#ship_address').val(billing_address);
           var ship_city        = $('#ship_city').val(billing_city);
           var ship_state       = $('#ship_state').val(billing_state);
           var ship_zip         = $('#ship_zip').val(billing_zip);
           var ship_phone1      = $('#ship_phone1').val(billing_phone1);
       });
        });
    </script>









    @endsection
@endsection
