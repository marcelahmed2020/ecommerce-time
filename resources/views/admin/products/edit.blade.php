@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','EDIT')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        EDIT
                        <small>  {{ auth()->user()->name  }}  </small>
                    </h2>
                </div>
                <div class="col-md-6">

                    <ol class="breadcrumb breadcrumb-bg-black">
                        <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('products.index')  }}" class="font_l">   Products</a></li>
                        <li class="active"><a href="#" class="font_l">Edit</a></li>

                    </ol>
                </div>
            </div>

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <form action="{{ route('products.update',$product->id) }}" id="form_validation" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Product
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="title">Title </label>
                                            <input type="text" name="title"  id="title" value="{{ $product->title  }}"  class="form-control" placeholder="title.?">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="price">Sale Price </label>
                                            <input type="text" name="price" id="price" value="{{ $product->price  }}"  class="form-control" placeholder="Sale Price.?">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="purchasing_price">Purchasing Price </label>
                                            <input type="text" name="purchasing_price" id="purchasing_price" value="{{ $product->purchasing_price  }}"  class="form-control" placeholder="Purchasing Price.?">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="stock">Genral Stock </label>
                                            <input type="text" name="stock" id="stock" value="{{ $product->stock   }}"  class="form-control" placeholder="Genral Stock.?">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="color">Color </label>
                                            <input type="text" name="color" id="color" value="{{ $product->color  }}"  class="form-control" placeholder="Color Is Option*">

                                        </div>
                                    </div>
                                </div> <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="brand">Brand </label>
                                            <input type="text" name="brand" id="brand" value="{{ $product->brand  }}"  class="form-control" placeholder="Brand">

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="short_desc"> Short Description</label>
                                            <textarea  id="short_desc"  class="form-control" placeholder="Short Description.?" name="short_desc" rows="4">{{ $product->short_desc  }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="desc">  Description</label>
                                            <textarea  id="desc"  class="form-control" placeholder="Description.?" name="desc" rows="8">{{ $product->desc  }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="sleeve">Sleeve Or None:</label>
                                            <select name="sleeve"   class="form-control">
                                                <option value="None" {{ $product->sleeve == 'None' ? 'selected':''}}> None... </option>
                                                @php
                                                    $sleeves = ['full sleeve','helf sleeve','short sleeve','sleeveless'];
                                                @endphp
                                                @foreach($sleeves as $sleeve)
                                                    <option value="{{$sleeve}}" {{ $product->sleeve  == $sleeve ? 'selected' : ''  }}>{{$sleeve}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="cat_id">Categories:</label>
                                            <select name="cat_id"   class="form-control">
                                                <option value="0" {{ $product->cat_id == 0 ? 'selected' : ''  }}> Main Product ... </option>
                                                @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}" {{ $product->cat_id == $cat->id ? 'selected' : ''  }}>{{$cat->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="featured">Feature:</label>
                                    <div class="form-group">
                                        <input type="radio"   {{ $product->featured == 1 ? 'checked':'' }}   value="1" name="featured" id="male" class="with-gap">
                                        <label for="male">YES</label>
                                        <input type="radio"  {{ $product->featured == 0 ? 'checked':'' }}  value="0" name="featured" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">NO</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="diffrent_size">Diffrent Sizes Or Not:</label>
                                    <div class="form-group">
                                        <input type="radio"   {{ $product->diffrent_size == 1 ? 'checked':'' }}   value="1" name="diffrent_size" id="male" class="with-gap">
                                        <label for="male">YES</label>
                                        <input type="radio"  {{ $product->diffrent_size == 0 ? 'checked':'' }}  value="0" name="diffrent_size" id="female" class="with-gap">
                                        <label for="female" class="m-l-20">NO</label>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label for="featured">Image:</label>
                                    <div class="form-group">
                                        <input type="file" name="image">
                                        @if(isset($product->image->image))
                                        <input type="hidden" name="old_image" value="{{ $product->image->image }}">
                                        <img src="{{url('backend/products_images/small/'.$product->image->image)}}">
                                          @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="Tags">Select Tags:</label>
                                    <div class="btn-group bootstrap-select show-tick form-control">
                                        <select name="tag[]" id="Tags" class="form-control show-tick" multiple="" tabindex="-98">
                                            @foreach($tags as $ta)
                                                @foreach($product->tags  as $tag)
                                                    <option value="{{$ta->id}}" {{$tag->id == $ta->id ?'selected':'' }}>{{$ta->name}}</option>
                                                @endforeach

                                            @endforeach
                                        </select></div>

                                </div>


                                <button type="submit" class="btn btn-block btn-lg bg-black waves-effect">
                                    <i class="material-icons">save</i>
                                    <span>UPDATE</span></button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</section>
@section('js_conent')
    <script>
        $(function () {
            $('#form_validation').validate({
                rules: {
                    'title': {
                        required: true,
                        minlength: 2
                    },    'desc': {
                        required: true,
                        minlength: 2
                    },    'price': {
                        required: true,
                    },   'cat_id': {
                        required: true,
                    },  'purchasing_price': {
                        required: true,
                    },
                    'short_desc': {
                        required: true,
                        minlength: 2
                    }
                },
                messages: {
                    title: 'This field is required',
                    short_desc: 'This field is required',
                },
                highlight: function (input) {
                    $(input).parents('.form-line').addClass('error');
                },
                unhighlight: function (input) {
                    $(input).parents('.form-line').removeClass('error');
                },
                errorPlacement: function (error, element) {
                    $(element).parents('.form-group').append(error);
                }
            });
        });
    </script>
@endsection
@endsection
