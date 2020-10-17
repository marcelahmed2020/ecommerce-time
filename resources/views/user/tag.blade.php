@section('site_name',$tag->name)

@extends('user.layout.app')
@section('content')

     <div class="well well-small">
         <ul class="breadcrumb">
             <li><a href="{{url('/')}}">Home</a> <span class="divider">/</span></li>
             <li><a href="{{url('/tags')}}">Tags</a> <span class="divider">/</span></li>
             <li class="active">#{{$tag->name}}</li>
         </ul>
    </div>

     <h4>Products </h4>
<ul class="thumbnails">
    @foreach($products as $key => $pro)
        <li class="span4">
            <div class="thumbnail">
                <a href="{{url('product/details/'.$pro->id)}}"><img src="{{url('backend/products_images/small/'.$pro->product_image)}}" alt=""></a>
                <div class="caption">
                    <h5>{{ $pro->title  }}</h5>
                    <p>
                        {{$pro->short_desc}}
                    </p>
                    <h4 style="text-align:center">
                        <a class="btn"  href="#">{{$pro->viewer}} <i class="icon-eye-close"></i> </a>
                        <a class="btn"  href="{{url('product/details/'.$pro->id)}}"> <i class="icon-zoom-in"></i></a>
                        <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="{{url('product/details/'.$pro->id)}}">{{$pro->price}} L.E</a></h4>
                </div>
            </div>
        </li>
    @endforeach


</ul>

@endsection
