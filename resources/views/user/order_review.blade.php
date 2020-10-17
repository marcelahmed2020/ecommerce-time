@section('site_name','Order Review')
@section('meta_desc',$settings->description)
@extends('user.layout.__app')
@section('content')


<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <form  class="form-horizontal" id="info_validation" action="">
                    <div class="checkbox-form">
                        <h4>Billing To</h4>
                        <br />
                        <div class="row">

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_first_name">First Name <span class="required">*</span></label>
                                    <input type="text" disabled   name="billing_first_name" id="billing_first_name"  value="{{$user->first_name}}"   placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_last_name">Last Name <span class="required">*</span></label>
                                    <input type="text" disabled  id="billing_last_name" value="{{$user->last_name}}"   name="billing_last_name" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_email">Email</label>
                                    <input type="email" disabled name="billing_email" id="billing_email" placeholder="Email" value="{{$user->email}}"  >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="country-select">
                                    <label for="billing_country">Country <span class="required">*</span></label>
                                    <select disabled id="billing_country" name="billing_country">

                                        @foreach($countries as $coun)
                                            <option {{$user->usersinfos->country == $coun->name ? 'selected':''}}  value="{{$coun->name}}">{{$coun->name}}</option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_address">Address <span class="required">*</span></label>
                                    <input type="text" disabled placeholder="Street address"  value="{{$user->usersinfos->address}}" id="billing_address" name="billing_address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_city">Town / City <span class="required">*</span></label>
                                    <input type="text" disabled placeholder="City"   value="{{$user->usersinfos->city}}"  id="billing_city" name="billing_city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_state">State <span class="required">*</span></label>
                                    <input type="text" disabled placeholder="State"    value="{{$user->usersinfos->state}}"  id="billing_state" name="billing_state">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_zip">Postcode / Zip <span class="required">*</span></label>
                                    <input type="text" disabled  name="billing_zip"   value="{{$user->usersinfos->zip}}"  id="billing_zip" placeholder="Zip / Postal Code">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="billing_phone1">Phone  <span class="required">*</span></label>
                                    <input type="text" disabled name="billing_phone1"  value="{{$user->usersinfos->phone1?:''}}"  id="billing_phone1" placeholder="phone">
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <form   id="checkout_validation" class="form-horizontal">
                    <div class="checkbox-form">
                        <h4>Shipping To</h4>
                        <br />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_first_name">First Name <span class="required">*</span></label>
                                    <input type="text" disabled   name="ship_first_name" id="ship_first_name"   value="{{! empty($delivery_address)?$delivery_address->ship_first_name:''}}"  placeholder="Shipping First Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_last_name">Last Name <span class="required">*</span></label>
                                    <input type="text" disabled  id="ship_last_name" value="{{! empty($delivery_address)?$delivery_address->ship_last_name:''}}"  name="ship_last_name" placeholder="Shipping Last Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_email">Email</label>
                                    <input type="email"  value="{{! empty($delivery_address)?$delivery_address->ship_email:''}}"   name="ship_email" id="ship_email" placeholder="Email"  >
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="country-select">
                                    <label for="ship_country">Country <span class="required">*</span></label>
                                    <select id="ship_country" disabled name="ship_country">
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
                                    <input type="text" disabled  id="ship_address" value="{{! empty($delivery_address)?$delivery_address->ship_address:''}}" name="ship_address" placeholder="Shipping Adress">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_city">Town / City <span class="required">*</span></label>
                                    <input type="text" disabled  id="ship_city" value="{{! empty($delivery_address)?$delivery_address->ship_city:''}}"  name="ship_city" placeholder="Shipping city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_state">State <span class="required">*</span></label>
                                    <input type="text" disabled  id="ship_state" value="{{! empty($delivery_address)?$delivery_address->ship_state:''}}"   name="ship_state" placeholder="Shipping State">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_zip">Postcode / Zip <span class="required">*</span></label>
                                    <input type="text" disabled  name="ship_zip"  value="{{! empty($delivery_address)?$delivery_address->ship_zip:''}}" id="ship_zip" placeholder="Shipping Zip / Postal Code">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="ship_phone1">Phone  <span class="required">*</span></label>
                                    <input type="text" disabled  name="ship_phone1"   value="{{! empty($delivery_address)?$delivery_address->ship_phone1:''}}"  id="ship_phone1" placeholder="Shipping phone">
                                </div>
                            </div>



                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="categori-menu-slider-wrapper clearfix">
        <div class="container">
        <div class="menu-slider-wrapper" style="    width: 97% !important;">


                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th>remove</th>
                                    <th>images</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $price = 0; @endphp
                                @if(carts()->count() > 0)
                                    @foreach(carts() as $cart)
                                        <tr>
                                            <td class="product-remove">
                                                <div class="quickview-btn-wishlist">
                                                    <a  href="{{ route('delete.cart',$cart->id)  }}"><i class="pe-7s-close"></i></a>
                                                    <a  class="btn-hover" href="{{route('product.wishlist',$cart->product_id)}}?size={{$cart->size}}&quantity={{$cart->quantity}}"><i class="pe-7s-like"></i></a></div>

                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="{{route('details',$cart->product_id)}}"><img src="{{url('/backend/products_images/small/'.$cart->product_image)}}"  alt=""></a>
                                            </td>
                                            <td class="product-name"><a href="{{route('details',$cart->product_id)}}">{{$cart->title}}</a></td>
                                            <td class="product-price-cart"><span class="amount">$ {{$cart->price}}</span></td>
                                            <td class="product-quantity">
                                                @if($cart->quantity  > 1)
                                                    <a class="btn btn-danger" href="{{ url('/quantity/cart/'.$cart->id.'/-1')  }}">-</a>
                                                @endif
                                                <input  min="1" max="5" style="max-width:34px" placeholder="quantity" value="{{$cart->quantity}}"  name="quantity" id="appendedInputButtons"size="16" type="text">

                                                <a class="btn btn-primary" href="{{ url('/quantity/cart/'.$cart->id.'/1')  }}"> +</a>
                                            </td>
                                            <td class="product-subtotal">$ {{$cart->price * $cart->quantity}}</td>
                                        </tr>
                                        @php
                                            $price += $cart->price * $cart->quantity;

                                        @endphp
                                    @endforeach
                                @else
                                    <td>

                                        Not Have Products In Your Cart</td>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="cart-page-total">
                                <h2>Choose Your Payment Methood:</h2>
                                <div class="cart-page-total">
                                    <form class="row" id="add_payment"  name="add_payment" action="{{route('place.order')}}" method="post"  >
                                        @csrf
                                        @if(! empty(Session::get('CouponAmount')))
                                            <input type="hidden" value="{{$total_price= $price - Session::get('CouponAmount') + getcharges($delivery_address->ship_country)}}" name="total_price" id="total_price">
                                        @else
                                            <input type="hidden" value="{{$price + getcharges($delivery_address->ship_country)}}" name="total_price" id="total_price">
                                        @endif
                                        <div class="col-md-4">


                                            <div class="checkout-form-list">
                                                <label   for="Bank">Bank Transfer </label>
                                                <input type="radio" style="height: 20px;" name="payment_method" id="Bank" value="Bank">
                                            </div>

                                        </div>
                                        <div class="col-md-4">


                                            <div class="checkout-form-list">
                                                <label   for="Paypal">Paypal  </label>
                                                <input type="radio" name="payment_method"  style="height: 20px;"  value="Paypal" id="Paypal">
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="checkout-form-list">
                                                <label   for="After_Deliver">After Deliver  </label>
                                                <input type="radio"  style="height: 20px;"  name="payment_method" id="After_Deliver" value="After_Deliver">
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            @if(carts()->count() > 0)
                                                @auth
                                                    <div class="order-button-payment">

                                                    <input type="submit" style="cursor: pointer" value="Order" onclick="selected_payment()" id="btn_che_b" >
                                                    </div>
                                                @endauth
                                            @endif
                                        </div>



                                    </form>
                                </div></div></div>
                            <div class="col-md-6">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal<span> $ {{$price}}</span></li>
                                        <li>Charge <span> $ {{ getcharges($delivery_address->ship_country) }}</span></li>
                                    @if(! empty(Session::get('CouponAmount')))
                                            <li>Discount<span>$  {{Session::get('CouponAmount')}}</span></li>
                                            <li>Total<span>$ {{$total_price= $price - Session::get('CouponAmount') +  getcharges($delivery_address->ship_country) }} </span></li>
                                        @else
                                            <li>Total<span>$ {{ $total_price = $price + getcharges($delivery_address->ship_country)}} </span></li>
                                        @endif
                                        <li>
                                            <div class="pricelist" class="alert alert-success" style="background-color: #e9ecef;padding: 5px;margin: 5px auto;    color: black;font-weight: bold;">
                                                @php
                                                    $currencies =  \App\Product::getCurrencyRates($total_price);

                                                     foreach ($currencies as $key => $currenc){
                                                         echo '<p>'.$key.'  '.$currenc.'</p>';
                                                     }

                                                @endphp </div>
                                        </li>

                                    </ul>
                                    {{--                                <a href="#"></a>--}}

                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="cart-page-total">

                                </div>
                        </div>
                        {{--                </form>--}}

            </div>
        </div>
    </div>
</div>
@section('js_content')
    <script>
        $(document).ready(function() {
            $('#btn_che_b').click(function () {
                if($("#Bank").prop('checked') == true || $("#Paypal").prop('checked') == true || $("#After_Deliver").prop('checked') == true){
                    alert('Thanks To Choose Methood :) , Press OK?');
                }else{
                    alert('Sorry You Should Choose Methood :(');
                    return false;
                }
            });
        });
    </script>
@endsection
@endsection
