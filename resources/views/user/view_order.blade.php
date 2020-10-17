@section('site_name','View Orders')
@section('meta_desc',$settings->description)
@extends('user.layout.__app')
@section('content')
<div class="overflow clearfix">
    <div class="categori-menu-slider-wrapper clearfix">

        <div class="menu-slider-wrapper" style="    width: 97% !important;">
            <div class="menu-style-3 menu-hover text-center">
                <nav>
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>


                        <li><a href="contact.html">contact</a></li>
                        <li><a href="contact.html">contact</a></li>
                        <li><a href="contact.html">contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="container ptb-10">
{{--                <h5 class=""></h5>--}}
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="your-order">
                                <h3>Order Review </h3>
                                <div class="panel-group pt-20" id="faq">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Name : {{$order->first_name}} {{$order->last_name}} &  E-mail : {{$order->user_email}} .</h3>
                                            <h3 class="panel-title">Country : {{$order->country}} & City : {{$order->city}} & State :{{$order->city}}  .</h3>
                                            <h4 class="panel-title">Street Address : {{$order->address}} & Zip : {{$order->zip}} & Street Address : {{$order->address}} & Zip : {{$order->zip}} .</h4>
                                            <h5 class="panel-title">  Shiping Charges : $ {{ $order->shiping_charges }} &  Grand Total : $ {{ $order->grand_total }} &  Payment Method : {{ $order->payment_method }} .</h5>
                                            <h6 class="panel-title">  Arrived : {{ $order->arrived }} &    Order Status : {{ $order->order_status }}   @if($order->coupon_amount != 0) & Coupon Amount : {{ $order->coupon_amount }} @endif.</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div id="grid-sidebar8" class="tab-pane fade active show pt-20">
                            <div class="row">
                                @foreach($order->order_products as $order_product)
                                <div class="col-lg-12">
                                    <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
                                        <div class="product-img list-img-width">
                                            <a href="{{url('/product/details/'.$order_product->product_id)}}">
                                                <img src="{{url('/backend/products_images/medium/'.$order_product->products->product_image)}}"    alt="">
                                            </a>

                                            <div class="product-action-list-style">
                                                <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal" href="{{url('/product/details/'.$order_product->product_id)}}">
                                                    <i class="pe-7s-look"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-list">
                                            <div class="product-list-info">
                                                <h4><a href="{{url('/product/details/'.$order_product->product_id)}}">{{$order_product->title}} </a></h4>
                                                <span>$ {{$order_product->price}}</span>
                                                <p> Quntity: {{$order_product->quntity }}</p>
                                                <p> @if(isset($order_product->size)) Size: {{$order_product->size }}@endif   </p>

                                                <p>{{$order_product->products->desc}}. </p>
                                            </div>
                                            <div class="product-list-cart-wishlist">
                                                <div class="product-list-cart">
                                                    <a class="btn-hover list-btn-style" href="{{url('/product/details/'.$order_product->product_id)}}">Details</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
