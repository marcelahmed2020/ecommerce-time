<div class="shop-sidebar">
    <div class="sidebar-widget">
        <h3 class="sidebar-title">Filter by Price</h3>
        <div class="price_filter">
            <div id="slider-range"></div>
            <div class="price_slider_amount">
                <div class="label-input">
                    <label>price : </label>
                    <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                </div>
                <button type="button">Filter</button>
            </div>
        </div>
    </div>
    <div class="">
        <h3 class="sidebar-title">Categories</h3>
        <div class="category-menu-list">
            <ul>
                @foreach($categories_aside as $key => $cat_as)
                    <li>
                        <a href="{{ route('category.product',$cat_as->title) }}">
                            {{$cat_as->title}}  @if($cat_as->categories_ch->count() > 0) <i class="pe-7s-angle-right"></i> @endif</a>
                        @if($cat_as->categories_ch->count() > 0)
                            <div class="category-menu-dropdown">
                                @foreach($cat_as->categories_ch as $cat_ch)
                                <div class="category-dropdown-style category-common2">
                                    <ul>
                                        <li><a href="{{ route('category.product',$cat_ch->title) }}"><h6> {{$cat_ch->title}}</h6></a></li> <br>
                                    </ul>
                                </div>
                                @endforeach


                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <form action="{{route('filter')}}" method="get">

    <div class="mt-50">
        <h3>Colors</h3>
        @php
         if (!empty($_GET['color'])){
          $color_array = explode('-',$_GET['color']);
                }
        @endphp
            @foreach($all_color as $col)
            <div class="form-group edit_gr">
            <input id="{{$col['color']}}" type="checkbox" onchange="javescript:this.form.submit()"
                   class="edit_inc" value="{{$col['color']}}" @if(!empty($color_array) && in_array($col['color'],$color_array)) checked="" @endif name="color[]">
                <label for="{{$col['color']}}" class="edit_la"> {{$col['color']}}</label>
            </div>
            @endforeach



    </div>
        <div class="mt-50">
        <h3>Sleeve</h3>
        @php
            $sleeves = ['full sleeve','helf sleeve','short sleeve','sleeveless'];
              if (!empty($_GET['sleeve'])){
               $sleeve_array = explode('-',$_GET['sleeve']);
               }
        @endphp
             @foreach($sleeves as $sleev)
            <div class="form-group ">
            <input id="{{$sleev}}" type="checkbox" onchange="javescript:this.form.submit()"
                   class="edit_inc" value="{{$sleev}}" @if(!empty($sleeve_array) && in_array($sleev,$sleeve_array)) checked="" @endif name="sleeve[]">
                <label for="{{$sleev}}" class="edit_la"> {{$sleev}}</label>
            </div>
            @endforeach



    </div>


        <div class="mt-50">
            <h3>Sizes</h3>
            @php
                if (!empty($_GET['size'])){
                 $sizes_array = explode('-',$_GET['size']);
                       }
            @endphp
            @foreach($all_sizes as $size)
                <div class="form-group edit_gr">
                    <input id="{{$size['size']}}" type="checkbox" onchange="javescript:this.form.submit()" class="edit_inc" value="{{$size['size']}}" @if(!empty($sizes_array) && in_array($size['size'],$sizes_array)) checked="" @endif name="size[]">
                    <label for="{{$size['size']}}" class="edit_la"> {{$size['size']}}</label>
                </div>
            @endforeach



        </div>
        <div class="mt-50">
            <h3>Brands</h3>
            @php
                if (!empty($_GET['brand'])){
                 $brand_array = explode('-',$_GET['brand']);
                       }
            @endphp
            @foreach($all_brand as $brand)
                <div class="form-group edit_gr">
                    <input id="{{$brand['brand']}}" type="checkbox" onchange="javescript:this.form.submit()" class="edit_inc" value="{{$brand['brand']}}" @if(!empty($brand_array) && in_array($brand['brand'],$brand_array)) checked="" @endif name="brand[]">
                    <label for="{{$brand['brand']}}" class="edit_la"> {{$brand['brand']}}</label>
                </div>
            @endforeach



        </div>
    </form>

@if($product_Rated->count() > 0)
    <div class="sidebar-widget mt-50">
        <h3 class="sidebar-title">Top rated products</h3>
        <div class="sidebar-top-rated-all">
            @foreach($product_Rated as $product_R)
            <div class="sidebar-top-rated mb-30">
                <div class="single-top-rated">
                    <div class="top-rated-img">
                        <a href="{{url('/product/details/'.$product_R->id)}}"><img width="91px" height="88px" src="{{url('/backend/products_images/small/'.$product_R->product_image)}}"  alt=""></a>
                    </div>
                    <div class="top-rated-text">
                        <h4><a  href="{{url('/product/details/'.$product_R->id)}}">{{$product_R->title}}</a></h4>
                        <div class="top-rated-rating">
                            <ul>
                                <?php
                                $i = 1;
                                while($i <= $product_R->rated){
                                    $i++;
                                    echo ' <li><i class="pe-7s-star"></i></li>';
                                }
                                ?>
                            </ul>
                        </div>
                        <span>$ {{$product_R->price}}</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
     @endif
</div>
