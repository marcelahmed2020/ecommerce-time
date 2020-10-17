@section('site_name','Cart')
@section('meta_desc',$settings->description)
@extends('user.layout.__app')
@section('content')
    <div class="container">
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
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                            <div class="coupon-all">
                                <form class="form-horizontal" action="{{ route('add.coupon')  }}" method="post">

                                    @csrf
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code"  placeholder="COUPON CODE" type="text">
                                        <input class="button"  value="Apply Coupon" type="submit">

                                    </div>
                                </form>
                                    <div class="coupon2">
                                     </div>
                                </div>



                        </div>  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                            <div class="coupon-all">
                                <form class="form-horizontal" action="{{ route('add.pincode')  }}" method="post">

                                    @csrf
                                    <div class="coupon">
                                        <input id="pincode" class="input-text" name="pincode"  placeholder="Pincodes" type="text">
                                        <input class="button"  value="Check" type="submit">

                                    </div>
                                </form>

                                </div>



                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Subtotal<span> $ {{$price}}</span></li>
                                    @auth
                                     @endauth

                                    @if(! empty(Session::get('CouponAmount')))
                                    <li>Discount<span>$  {{Session::get('CouponAmount')}}</span></li>
                                        <li>Total<span>$ {{ $totald_t = $price - Session::get('CouponAmount') }} </span></li>
                                    @else
                                        @auth

                                    <li>Total<span>$   {{  $totald_t =$price}} </span></li>
                                         @else
                                        <li>Total<span>$   {{  $totald_t =$price}} </span></li>

                                        @endauth
                                    @endif
                                    @if(carts()->count() > 0)

                                    <div class="pricelist" class="alert alert-success" style="background-color: #e9ecef;padding: 5px;margin: 5px auto;    color: black;font-weight: bold;">
                                        @php
                                             $currencies =  \App\Product::getCurrencyRates($totald_t);

                                             foreach ($currencies as $key => $currenc){
                                                 echo '<p>'.$key.'  '.$currenc.'</p>';

                                             }

                                        @endphp </div>
                                    @endif


                                </ul>
                                 @if(carts()->count() > 0)
                                    @auth
                                        <a href="{{route('user.checkout')}}" >Proceed to checkout </a>
                                    @else
                                        <a href="{{route('user.login')}}" >For Checkout Nedd To Login</a>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
             </div>
        </div>
</div>

@php \Session::put('price',$price); @endphp

@endsection
