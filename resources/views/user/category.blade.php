@section('site_name','Home')
@section('meta_desc',$settings->description)
@extends('user.layout.__app')
@section('content')
<div class="breadcrumb-area pt-205 pb-210" style="background-image: url({{url('backend/about_images/81771.jpeg')}})">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>{{$category->title}}</h2>
                    <ul>
                      <li><a href="{{url('/')}}">home</a></li>
                        <li><a href="{{url('/Categories')}}">Categories</a></li>
                        <li>{{$category->title}}  </li>
                    </ul>
                    <br>
                    <b> {{$category->short_desc}}</b>
                </div>
            </div>
        </div>

  <br>
    <div class="shop-product-wrapper res-xl">
        <div class="shop-bar-area">
            <div class="shop-product-content tab-content">

                <div id="grid-sidebar12" class="tab-pane fade active show">
                    <div class="row">
                         @foreach($products as $product)
                        <div class="col-md-12 col-xl-6">
                            <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
                                <div class="product-img list-img-width">
                                    <a href="#">
                                        <img src="{{url('/backend/products_images/medium/'.$product->product_image)}}" alt="{{$product->title}}">

                                    </a>
                                    <span>hot</span>
                                    <div class="product-action-list-style">
                                        <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#exampleModal_{{$product->id}}" href="#">
                                            <i class="pe-7s-look"></i>
                                        </a>  <a class="animate-right" href="{{route('product.wishlist',$product->id)}}?size=0&quantity=1">
                                            <i class="pe-7s-like"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-list">
                                    <div class="product-list-info">
                                        <h4><a href="#">{{$product->title}}</a></h4>
                                        <span>$ {{$product->price}}</span>
                                        <p>{{$product->short_desc}}. </p>
                                        <p>
                                        <div class="top-rated-rating">
                                            <ul>
                                                <?php
                                                $i = 1;
                                                while($i <= $product->rated){
                                                    $i++;
                                                    echo '<li><i class="pe-7s-star"></i></li>';
                                                }
                                                ?>
                                                {{--                                                    @for($)--}}
                                                {{--                                                    <li><i class="pe-7s-star"></i></li>--}}
                                                {{--                                                    <li><i class="pe-7s-star"></i></li>--}}
                                                {{--                                                    <li><i class="pe-7s-star"></i></li>--}}
                                                {{--                                                    <li><i class="pe-7s-star"></i></li>--}}
                                                {{--                                                    <li><i class="pe-7s-star"></i></li>--}}
                                            </ul>
                                        </div>
                                        </p>
                                    </div>
                                    <div class="product-list-cart-wishlist">

                                        <div class="product-list-cart">

                                        <form style="display: inline" class="form-horizontal qtyFrm" method="post" action="{{route('add.cart')}}">
                                            @csrf
                                            <input type="hidden" name="title" value="{{$product->title}}" />
                                            <input type="hidden" name="short_desc" value="{{$product->short_desc}}" />
                                            <input type="hidden" name="image" value="{{$product->product_image}}" />
                                            <input type="hidden" name="code" value="{{$product->code}}" />
                                            <input type="hidden" name="color" value="{{$product->color}}" />
                                            <input type="hidden" name="product_id" value="{{$product->id}}" />
                                            <input type="hidden" name="size" id="updasize"  value="0" />
                                            <input type="hidden" name="price" id="updaprice" value="{{$product->price}}" />

                                            <div class="control-group">
                                                <div class="controls">
                                                    <input type="hidden" class="span1" name="quantity" id="update_stock" value="1"  min="1" max="10" value="1" placeholder="Qty.">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <button style="cursor: pointer   ; height: 56px;" type="submit" class="btn btn-large btn-primary pull-right"    id="add_t_cart"> Add to cart <i class="pe-7s-cart"></i></button>

                                                </div>
                                            </div>

                                        </form>
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

    @section('js_content')
        <!-- modal -->
        @foreach($products as $product)
            <div class="modal fade" id="exampleModal_{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="pe-7s-close" aria-hidden="true"></span>
            </button>
            <div class="modal-dialog modal-quickview-width" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="qwick-view-left">
                            <div class="quick-view-learg-img">
                                <div class="quick-view-tab-content tab-content">
                                    <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                        <img src="{{url('/backend/products_images/medium/'.$product->product_image)}}" alt="">
                                    </div>
                                    <div class="tab-pane fade" id="modal2" role="tabpanel">
                                        <img src="{{url('/backend/products_images/medium/'.$product->product_image)}}" alt="">
                                    </div>
                                    <div class="tab-pane fade" id="modal3" role="tabpanel">
                                        <img src="{{url('/backend/products_images/medium/'.$product->product_image)}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="quick-view-list nav" role="tablist">
                                @foreach($product->product_images as $key => $prod)
                                    <a @if($key == 0) class="active" @endif href="#modal1" data-toggle="tab" role="tab">
                                        <img  src="{{url('/backend/products_images/'.$prod->image)}}" alt="{{$product->title}}">
                                    </a>

                                @endforeach

{{--                                <a href="#modal2" data-toggle="tab" role="tab">--}}
{{--                                    <img src="{{url('/backend/products_images/medium/'.$product->product_image)}}" alt="">--}}
{{--                                </a>--}}
{{--                                <a href="#modal3" data-toggle="tab" role="tab">--}}
{{--                                    <img src="{{url('/backend/products_images/medium/'.$product->product_image)}}" alt="">--}}
{{--                                </a>--}}
                            </div>
                        </div>
                        <div class="qwick-view-right">
                            <div class="qwick-view-content">
                                <h3>{{$product->title}}</h3>
                                <div class="price">
                                    <span class="new">$ {{$product->price}}</span>
{{--                                    <span class="old">$120.00  </span>--}}
                                </div>
                                <div class="rating-number">
                                    <div class="quick-view-rating">
                                        <?php
                                        $i = 1;
                                        while($i <= $product->rated){
                                            $i++;
                                            echo ' <i class="pe-7s-star"></i>';
                                        }
                                        ?>

                                    </div>
                                    <div class="quick-view-number">
                                        <span>{{$product->rated}} Ratting (S)</span>
                                    </div>
                                </div>
                                <p>{{$product->short_desc}}.</p>
                                <div class="quick-view-select">

                                    @if($product->product_attributes->count() > 0)
                                        <div class="select-option-part">
                                            <label>Size*</label>
                                            <select class="select">
                                                <option value="0">Select Size:</option>
                                                @foreach($product->product_attributes as $attribute)
                                                    @if($attribute->stock > 0)
                                                        <option value="{{$attribute->id}}-{{$attribute->size}}">{{$attribute->size}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    @if(! empty($product->color))
                                    <div class="select-option-part">
                                        <label>Color*</label>
                                        <select class="select">
                                            <option value="">- {{$product->color}} -</option>
                                        </select>
                                    </div>
                                    @endif
                                </div>
                                <div class="quickview-plus-minus">

                                    <div class="quickview-btn-cart">
                                        <form style="display: inline" class="form-horizontal qtyFrm" method="post" action="{{route('add.cart')}}">
                                            @csrf
                                            <input type="hidden" name="title" value="{{$product->title}}" />
                                            <input type="hidden" name="short_desc" value="{{$product->short_desc}}" />
                                            <input type="hidden" name="image" value="{{$product->product_image}}" />
                                            <input type="hidden" name="code" value="{{$product->code}}" />
                                            <input type="hidden" name="color" value="{{$product->color}}" />
                                            <input type="hidden" name="product_id" value="{{$product->id}}" />
                                            <input type="hidden" name="size" id="updasize"  value="0" />
                                            <input type="hidden" name="price" id="updaprice" value="{{$product->price}}" />

                                            <div class="control-group">
                                                <div class="controls">
                                                    <input type="number" class="span1" name="quantity" id="update_stock" min="1" max="10" value="1" placeholder="Qty.">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <button style="cursor: pointer   ; height: 56px;" type="submit" class="btn btn-large btn-primary pull-right"    id="add_t_cart"> Add to cart <i class="pe-7s-cart"></i></button>

                                                </div>
                                            </div>
                                        </form>
{{--                                        <a class="btn-hover-black" href="#">add to cart</a>--}}
                                    </div>
                                    <div class="quickview-btn-wishlist">
                                        <a class="btn-hover" href="{{route('product.wishlist',$product->id)}}?size=0&quantity=1"><i class="pe-7s-like"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       @endforeach
        <!-- modal -->
        <div class="modal fade" id="exampleCompare" tabindex="-1" role="dialog" aria-hidden="true">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="pe-7s-close" aria-hidden="true"></span>
            </button>
            <div class="modal-dialog modal-compare-width" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="#">
                            <div class="table-content compare-style table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>
                                            <a href="#">Remove <span>x</span></a>
                                            <img src="{{url('/user')}}/img/cart/4.jpg" alt="">
                                            <p>Blush Sequin Top </p>
                                            <span>$75.99</span>
                                            <a class="compare-btn" href="#">Add to cart</a>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="compare-title"><h4>Description </h4></td>
                                        <td class="compare-dec compare-common">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has beenin the stand ard dummy text ever since the 1500s, when an unknown printer took a galley</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title"><h4>Sku </h4></td>
                                        <td class="product-none compare-common">
                                            <p>-</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title"><h4>Availability  </h4></td>
                                        <td class="compare-stock compare-common">
                                            <p>In stock</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title"><h4>Weight   </h4></td>
                                        <td class="compare-none compare-common">
                                            <p>-</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title"><h4>Dimensions   </h4></td>
                                        <td class="compare-stock compare-common">
                                            <p>N/A</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title"><h4>brand   </h4></td>
                                        <td class="compare-brand compare-common">
                                            <p>HasTech</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title"><h4>color   </h4></td>
                                        <td class="compare-color compare-common">
                                            <p>Grey, Light Yellow, Green, Blue, Purple, Black </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title"><h4>size    </h4></td>
                                        <td class="compare-size compare-common">
                                            <p>XS, S, M, L, XL, XXL </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="compare-title"></td>
                                        <td class="compare-price compare-common">
                                            <p>$75.99 </p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    @endsection
@endsection
