@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name',$product->title)
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        {{$product->title}}
                        <small>  {{ auth()->user()->name  }}  </small>
                    </h2>
                </div>
                <div class="col-md-6">

                    <ol class="breadcrumb breadcrumb-bg-black">
                        <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('products.index')  }}" class="font_l">   Products</a></li>
                        <li class="active"><a href="#" class="font_l">SHOW #{{$product->id}}</a></li>

                    </ol>
                </div>
            </div>

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{$product->title}}
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    @permission('update_products')
                                    <li>
                                    <a    class=" waves-effect waves-block" href="{{ route('products.edit',$product->id)  }}" title="Edit">EDIT</a>  </li>
                                    @endpermission

                                    @permission('delete_products')
                                    <form   style="margin:0px 2px  ;display:inline"
                                            action="{{ route('products.destroy',$product->id)  }}" id="date-form-sliders-{{ $product->id}}"
                                            method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>

                                    <li><a    onclick="
                                        if(confirm('Are You Sure, You Want To Delete This Product!?')){
                                        event.preventDefault();document.getElementById('date-form-sliders-{{ $product->id}}').submit()
                                        }else{
                                        event.preventDefault();
                                            }" title="Delete"   class=" waves-effect waves-block" href="{{ route('products.destroy',$product->id)  }}"> DELETE     </a></li>
                                    @endpermission

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <p class="lead"><strong>  Product Code </strong>: {{  $product->code  }}</p>
                        <hr>  <p class="lead"><strong>  Product Sale price </strong>: {{  $product->price  }} L.E</p>
                        <hr>  <p class="lead"><strong>  Product Viewer </strong>: {{  $product->viewer  }} </p>
                        <hr>  <p class="lead"><strong>  Product Purchasing Price </strong>: {{  $product->purchasing_price  }} L.E</p>
                        <hr> <p class="lead"><strong>  Product Featured </strong>: {{  $product->featured == 1? 'YES' : 'NO'  }}</p>
                        <hr> <p class="lead"><strong>  Product Stock </strong>: {{  $product->stock  }}</p>
                        <hr> <p class="lead"><strong>  Product Sleeve </strong>: {{  $product->sleeve  }}</p>
                        <hr> <p class="lead"><strong>  Product Brand </strong>: {{  $product->brand  }}</p>

                        <hr> <p class="lead"><strong>  Product Diffrent Sizes Or Not </strong>: {{  $product->diffrent_size == 1? 'YES' : 'NO'  }}</p>
                        <hr> <p class="lead"> <strong> Category</strong>: <a href="{{route('categories.index')}}?id={{$product->cat_id}}">{{  !empty($product->category)?$product->category->title:''   }}</a></p>

                        <hr>
                        <p class="lead">
                           <strong>  Short Description </strong>: {{  $product->short_desc  }}
                        </p>
                        <hr>
                        <p  class="lead">
                              <strong>Description</strong> : {{  $product->desc  }}
                        </p>
                        <hr>
                        <p  class="lead">
                            @if($product->users->count() == 0)
                                Not Found
                            @else
                                @php
                                    $user =  $product->users->first();
                                     echo  'Author: <a href="'.route('admins.show',$user->id).'"> By ' . $user->first_name .' '. $user->last_name.'</a> <b class="pull-right">  '.    $product->created_at->diffForHumans() .'</b>' ;
                                @endphp

                            @endif

                        </p>
                        @if($product->edit != 0)
                        <p  class="lead">
                            <strong>Edit By</strong> :<a href="{{route('admins.show',$user->id)}}">  {{  $product->editor->first_name   }} {{$product->editor->last_name  }} </a>   <b class="pull-right">  {{  $product->created_at->diffForHumans()  }}</b>
                        </p>
                        @endif
                        <p  class="lead">
                        <hr>
                       @if($product->color == 0)
                            <strong>Color</strong> : Not Have Color
                        @else
                            <strong>Color</strong> :{{$product->color}}
                               @endif
                         </p>
                        <hr>
                        <p>
                             @if(isset($product->image->image))
                                 <img src="{{url('backend/products_images/medium/'.$product->image->image)}}">
                             @endif
                         </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><a href="{{ route('tag.index') }}">Tages</a></h2>
                    </div>
                    <div class="body">
                        <div class="button-demo">
                             @if($product->tags()->count() > 0 )
                                 @foreach($product->tags  as $tag)
                            <a href="{{ route('tag.index') }}?id={{$tag->id}}" target="_blank" title="" class="btn bg-black waves-effect waves-light">{{$tag->name}}</a>
                                @endforeach
                             @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
