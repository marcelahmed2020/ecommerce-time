@section('site_name',$product->title)
@section('meta_desc',$product->description)

@extends('user.layout.__app')
@section('content')
<div class="product-details">

    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{url('/')}}">Home   </a> <span class="divider">/</span></li>
            <li><a href="{{ url('/products')}}">Products</a> <span class="divider">/</span></li>
            <li class="active">{{$product->title}}</li>
        </ul>
        <div class="row">

            <div class="col-md-12 col-lg-7 col-12">

                <div class="product-details-4 pr-70">
                    <div class="easyzoom easyzoom--overlay is-ready">
                        <a href="{{url('/backend/products_images/large/'.$product->product_image)}}">
                            <img src="{{url('/backend/products_images/medium/'.$product->product_image)}}" alt="{{$product->title}}">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-5 col-12">
                <div class="product-details-content">
                    <h3>{{$product->title}}</h3>
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
                    <div class="details-price">
                        <span id="getprice">$ {{$product->price}}</span>
                         <div class="pricelist" class="alert alert-success" style="background-color: #e9ecef;padding: 5px;margin: 5px auto;    color: black;font-weight: bold;">
                             @php
          foreach (getCurrencyRates($product->price) as $key => $currenc){
                  echo  $currenc?$key.'  '.$currenc:'';
                  echo '<br />';
           }
                             @endphp 
                         </div>

                    </div>
                    <p>
                        <small>{{$product->desc}}</small>

                    </p>
                    <div class="product-color-2">
                        @if(! empty($product->color))
                            <h4 class="details-title">Color*</h4>
                            <div class="control-group">
                                <div class="controls">
                                    <select class="span2">
                                        <option>{{$product->color}}</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                    </div>


                        @if($product->product_attributes->count() > 0)
                        <div class="product-size-2">
                            <h4 class="details-title">Size*</h4>
                            <div class="control-group">
                                <div class="controls">
                                    <select class="span2 size" id="id_size"  name="size">
                                        <option value="0">Select Size:</option>
                                        @foreach($product->product_attributes as $attribute)
                                            @if($attribute->stock > 0)
                                                <option value="{{$attribute->id}}-{{$attribute->size}}">{{$attribute->size}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </div>
                        @endif

                    <div class="quickview-plus-minus">

                        <div class="quickview-btn-cart" style="position: relative">

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
                            <div class="quickview-btn-wishlist" style="    position: absolute;    left: 153px;
    bottom: -5px;"><a style="    height: 56px;" class="btn-hover" href="{{route('product.wishlist',$product->id)}}?size=0&quantity=1"><i class="pe-7s-like"></i></a></div>
                            <div class="quickview-btn-wishlist" style="    position: absolute;        left: 238px;
    bottom: -5px;    width: 338px;"><a style="    height: 56px;" class="btn-hover" href="#">{{$product->viewer}} <i class="pe-7s-look"></i></a></div>
{{--                            <a href="#">add to cart</a>--}}


                    </div>
                    </div>

                    <div class="product-details-cati-tag mt-35">
                        <ul>
                            <li class="categories-title"><span id="id_stock">{{$product->stock}}</span> items in stock</li>
                        </ul>
                    </div>     <div class="product-details-cati-tag mt-35">
                        <ul>
                            <li class="categories-title">Category :</li>
                            <li><a @if(!empty($product->category)) href="{{ route('category.product',$product->category->title)}}"@endif>{{!empty($product->category)?$product->category->title:''}}</a></li>
                        </ul>
                    </div>
                    <div class="product-details-cati-tag mtb-10">
                        <ul>
                            <li class="categories-title">Tags :</li>
                            @if($product->tags()->count() > 0 )
                                @foreach($product->tags  as $tag)
                                    <li><a target="_blank"  href="{{ route('tag.product',$tag->name)}}" >{{$tag->name}}</a></li>
                                @endforeach
                                @else
                                <li><a>Not Tags Yet</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="bundle-area">
                         <div class="bundle-img">
                             @foreach($product->product_images as $prod)
                                 <div class="single-bundle-img">
                                     <a href="#"><img src="{{url('/backend/products_images/'.$prod->image)}}" alt="{{$product->title}}"></a>
                                 </div>
                             @endforeach

                        </div>

                        <div class="product-details5-social">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-flikr"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-description-review-area pb-70">
    <div class="container">
        <div class="product-description-review text-center">
            <div class="description-review-title nav" role="tablist">
                <a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="false">
                    Description
                </a>
                <a href="#pro-review" data-toggle="tab" role="tab" aria-selected="true" class="">
                    Reviews (0)
                </a>
            </div>
            <div class="description-review-text tab-content">
                <div class="tab-pane fade active show" id="pro-dec" role="tabpanel">
                    <p>{{$product->desc}}</p>
                </div>
                <div class="tab-pane fade " id="pro-review" role="tabpanel">
                    <a href="#">Be the first to write your review!</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-95">
    <div class="container">
        <div class="section-title-3 text-center mb-50">
            <h2>Related products</h2>
        </div>

    </div>
</div>

@endsection
