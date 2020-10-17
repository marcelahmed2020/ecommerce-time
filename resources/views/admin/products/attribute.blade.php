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
                        <li class="active"><a href="#" class="font_l">Attribute #{{$product->id}}</a></li>

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
                        <hr>  <p class="lead"><strong>  Product Purchasing Price </strong>: {{  $product->purchasing_price  }} L.E</p>




                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">Attribute</div>
                    <div class="body table-responsive">
                       @if(boolval($attribute) == true)
                            <form action="{{ route('products.attribute_update',$attribute->id) }}" class="row" method="post">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                                <input type="hidden" value="{{$product->id}}" name="product_id">
                                <div class="col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="sku"  id="sku" value="{{ $attribute->sku  }}"  class="form-control" placeholder="SKU.?">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="size"  id="size" value="{{ $attribute->size  }}"  class="form-control" placeholder="SIZE.?">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="stock"  id="stock" value="{{ $attribute->stock   }}"  class="form-control" placeholder="STOCK.?">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="price"  id="price" value="{{ $attribute->price   }}"  class="form-control" placeholder="Price.?">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="purchasing_price"  id="purchasing_price" value="{{ $attribute->purchasing_price  }}"  class="form-control" placeholder="Purchasing Price.?">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-block btn-lg btn-default waves-effect">UPDATE</button>
                                </div>
                            </form>
                           @else
                            <form action="{{ route('products.attribute_add') }}" class="row" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$product->id}}" name="product_id">
                                <div class="col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="sku"  id="sku" value="{{ old('sku')  }}"  class="form-control" placeholder="SKU.?">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="size"  id="size" value="{{ old('size')  }}"  class="form-control" placeholder="SIZE.?">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="stock"  id="stock" value="{{ old('stock')  }}"  class="form-control" placeholder="STOCK.?">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="price"  id="price" value="{{ old('price')  }}"  class="form-control" placeholder="Price.?">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="purchasing_price"  id="purchasing_price" value="{{ old('purchasing_price')  }}"  class="form-control" placeholder="Purchasing Price.?">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-block btn-lg btn-default waves-effect">ADD</button>
                                </div>
                            </form>
                       @endif
                        @if($product->product_attributes->count()  > 0)

                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Size</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Purchasing Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($product->product_attributes as $key => $attributes)
                            <tr class="active">
                                <th scope="row">{{$key + 1}}</th>
                                <td>{{$attributes->sku}}</td>
                                <td>{{$attributes->size}}</td>
                                <td>{{$attributes->stock}}</td>
                                <td>{{$attributes->price}} L.E</td>
                                <td>{{$attributes->purchasing_price}} L.E</td>
                                <td>
                                    @permission('update_products')
                                    <a class="btn btn-info btn-sm" href="?attribute={{$attributes->id}}" title="Edit"> <i class="material-icons">mode_edit</i>  </a>
                                    @endpermission

                                    @permission('delete_products')
                                    <form   style="margin:0px 2px  ;display:inline"
                                            action="{{ route('products.attribute_delete',$attributes->id)  }}" id="date-form-attribute_delete-{{ $attributes->id}}"
                                            method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form>

                                    <a class="btn btn-danger btn-sm"  onclick="
                                        if(confirm('Are You Sure, You Want To Delete This Attribute!?')){
                                        event.preventDefault();document.getElementById('date-form-attribute_delete-{{ $attributes->id}}').submit()
                                        }else{
                                        event.preventDefault();
                                        }" title="Delete"  href="{{ route('products.attribute_delete',$attributes->id)  }}"><i class="material-icons">delete</i>   </a>
                                    @endpermission
                                </td>

                            </tr>
                             @endforeach
                            </tbody>
                        </table>
                       @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">Images</div>
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-12">
                            <form action="{{ route('products.image_add') }}" class="row" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" value="{{$product->id}}" name="product_id">
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="image[]" required="" multiple   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <button type="submit" class="btn btn-block btn-lg btn-default waves-effect">ADD</button>
                                </div>
                            </form>
                            </div>
                            @if($product->product_images->count()  > 0)
                               @foreach($product->product_images as $key => $image)
                            <div class="col-sm-12 col-md-6">
                                <div class="thumbnail">
                                    <img src="{{url('backend/products_images/'.$image->image)}}">
                                    <div class="caption">
                                        <p>
                                            @permission('delete_products')
                                        <form   style="margin:0px 2px  ;display:inline"
                                                action="{{ route('products.image_delete',$image->id)  }}" id="date-form-image-{{ $image->id}}"
                                                method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>

                                        <a class="btn btn-danger btn-sm"  onclick="
                                            if(confirm('Are You Sure, You Want To Delete This Image!?')){
                                            event.preventDefault();document.getElementById('date-form-image-{{ $image->id}}').submit()
                                            }else{
                                            event.preventDefault();
                                            }" title="Delete"  href="{{ route('products.image_delete',$image->id)  }}"><i class="material-icons">delete</i>   </a>
                                        @endpermission
                                        </p>
                                    </div>
                                </div>
                            </div>
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
