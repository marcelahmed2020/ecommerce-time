@section('site_name','Wishlist')
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
                                @if(wishlist()->count() > 0)
                                    @foreach(wishlist() as $wishlist)
                                        <tr>
                                            <td class="product-remove">
                                                <a  href="{{ route('delete.wishlist',$wishlist->id)  }}"><i class="pe-7s-close"></i></a>
                                                 <form style="cursor: pointer; display: inline" method="post" action="{{route('add.cart')}}">
                                                    @csrf
                                                    <input type="hidden" name="title" value="{{$wishlist->title}}" />
                                                    <input type="hidden" name="short_desc" value="{{$wishlist->short_desc}}" />
                                                    <input type="hidden" name="image" value="{{$wishlist->product_image}}" />
                                                    <input type="hidden" name="code" value="{{$wishlist->code}}" />
                                                    <input type="hidden" name="color" value="{{$wishlist->color}}" />
                                                    <input type="hidden" name="product_id" value="{{$wishlist->product_id}}" />
                                                    <input type="hidden" name="size" id="updasize"  value="0" />
                                                    <input type="hidden" name="price" id="updaprice" value="{{$wishlist->price}}" />
                                                    <input type="hidden"  name="quantity"  value="1">
                                                    <button type="submit"    id="add_t_cart"> <i class="pe-7s-cart"></i></button>
                                                </form>

                                            </td>
                                            <td class="product-thumbnail">
                                                <a  href="{{url('/product/details/'.$wishlist->id)}}"><img src="{{url('/backend/products_images/small/'.$wishlist->product_image)}}"  alt=""></a>
                                            </td>
                                            <td class="product-name"><a  href="{{url('/product/details/'.$wishlist->id)}}">{{$wishlist->title}}</a></td>
                                            <td class="product-price-cart"><span class="amount">$ {{$wishlist->price}}</span></td>
                                            <td class="product-quantity">

                                                <input  disabled max="1" style="max-width:34px" placeholder="quantity" value="{{$wishlist->quantity}}"  name="quantity" id="appendedInputButtons"size="16" type="text">
                                            </td>
                                            <td class="product-subtotal">$ {{$wishlist->price * $wishlist->quantity}}</td>
                                        </tr>
                                        @php
                                            $price += $wishlist->price * $wishlist->quantity;

                                        @endphp
                                    @endforeach
                                    @else
                                    <td>

                                        Not Have Products In Your Wishlist</td>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        @if(wishlist()->count() > 0)
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal<span> $ {{$price}}</span></li>
                                            <li>Total<span>$ {{ $price}} </span></li>


                                    </ul>

                                </div>
                            </div>
                        </div>
                        @endif
                        {{--                </form>--}}
                    </div>
                </div>
            </div>


@endsection
