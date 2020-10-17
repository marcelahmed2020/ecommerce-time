@section('site_name','Orders')
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
             <div class="container">
                <h5 class="ptb-10">Orders</h5>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       @if(! empty(Session::get('order_id')))
                    <div class="your-order">
                            <h3>Success To Make Order </h3>
                                    <div class="panel-group" id="faq">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Thanks Your ({{Session::get('payment_method')}}) Order Has Been Placed .</h5>
                                                <h6>Your Order Number Is ({{Session::get('order_id')}}) And Total Payment Is $ ({{Session::get('total_price')}}).</h6>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                      @endif
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order Products</th>
                                    <th>Proccess</th>
                                    <th>Payment Method</th>
                                    <th>Total</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($orders->count() > 0)
                                    @foreach($orders as $key  => $order)
                                        <tr  @if(Session::get('order_id') == $order->id)
                                            style="background-color: #dddddd"
                                        @endif>
                                        <td><a href="{{url('/user/view-order/'.$order->id)}}"> {{$order->id}}</a></td>
                                            <td><a href="{{url('/user/view-order/'.$order->id)}}">
                                                @foreach($order->order_products as $prod)
                                                       <p> <a href="{{url('/product/details/'.$prod->product_id)}}"> {{$prod->code}}</a></p>
                                                @endforeach
                                                </a></td>
                                            <td><a href="{{url('/user/view-order/'.$order->id)}}">{{$order->arrived}}</a></td>
                                            <td><a href="{{url('/user/view-order/'.$order->id)}}">{{$order->payment_method}}</a></td>
                                            <td><a href="{{url('/user/view-order/'.$order->id)}}">$ {{$order->grand_total + $order->shiping_charges	}} </a></td>
                                            <td><a href="{{url('/user/view-order/'.$order->id)}}"> {{$order->created_at->diffForHumans() }} </a></td>
                                            <td><a href="{{url('/user/view-order/'.$order->id)}}"  class="btn btn-outline-info">View Detaitls </a></td>
{{--                                            ','edit','delete','last_name','user_email','user_id','country','address','city','zip','state','phone1','shiping_charges','coupon_code','coupon_amount','order_status','payment_method',''--}}
                                        </tr>

                                    @endforeach
                                @else
                                    <td>
                                        Not Have Orders</td>
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@php
    Session::forget('order_id');
    Session::forget('payment_method');
    Session::forget('total_price');
@endphp
@endsection
