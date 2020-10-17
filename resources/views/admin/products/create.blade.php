@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','ADD')
<section class="content">
      <div class="container-fluid">
            <div class="block-header">
                    <div class="row">
                      <div class="col-md-6">
                                         <h2>
                                        ADD
                                          <small>  {{ auth()->user()->name  }}  </small>
                                        </h2>
                                        </div>
                      <div class="col-md-6">

                          <ol class="breadcrumb breadcrumb-bg-black">
                         <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('products.index')  }}" class="font_l">   Products</a></li>
                       <li class="active"><a href="#" class="font_l">Add</a></li>

                                                    </ol>
                      </div>
                    </div>

            </div>
            <!-- Basic Examples -->
           <div class="row clearfix">
          <form action="{{ route('products.store') }}" id="form_validation" method="post" enctype="multipart/form-data">
                               {{ csrf_field() }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="card">
                                   <div class="header">
                                       <h2>
                                         Add Product
                                       </h2>
                                   </div>
                                   <div class="body">
                                       <div class="row clearfix">
                                           <div class="col-sm-12">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                        <label for="title">Title </label>
                                                       <input type="text" name="title"  id="title" value="{{ old('title')  }}"  class="form-control" placeholder="title.?">

                                                   </div>
                                               </div>
                                           </div>

                                             <div class="col-sm-4">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                        <label for="price">Sale Price </label>
                                                       <input type="text" name="price" id="price" value="{{ old('price')  }}"  class="form-control" placeholder="Sale Price.?">

                                                   </div>
                                               </div>
                                           </div>

                                           <div class="col-sm-4">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                        <label for="purchasing_price">Purchasing Price </label>
                                                       <input type="text" name="purchasing_price" id="purchasing_price" value="{{ old('purchasing_price')  }}"  class="form-control" placeholder="Purchasing Price.?">

                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-sm-4">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                       <label for="stock">Genral Stock </label>
                                                       <input type="text" name="stock" id="stock" value="{{ old('stock')  }}"  class="form-control" placeholder="Genral Stock.?">
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-sm-4">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                        <label for="color">Color </label>
                                                       <input type="text" name="color" id="color" value="{{ old('color')  }}"  class="form-control" placeholder="Color Is Option*">

                                                   </div>
                                               </div>
                                           </div>    <div class="col-sm-4">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                        <label for="brand">Brand </label>
                                                       <input type="text" name="brand" id="brand" value="{{ old('brand')  }}"  class="form-control" placeholder="Brand">

                                                   </div>
                                               </div>
                                           </div>


                                        <div class="col-sm-12">
                                        <div class="form-group">
                                        <div class="form-line">
                                            <label for="short_desc"> Short Description</label>
                                             <textarea  id="short_desc"  class="form-control" placeholder="Short Description.?" name="short_desc" rows="4">{{ old('short_desc')  }}</textarea>
                                        </div>
                                        </div>
                                        </div>
                                           <div class="col-sm-12">
                                        <div class="form-group">
                                        <div class="form-line">
                                            <label for="desc">  Description</label>
                                             <textarea  id="desc"  class="form-control" placeholder="Description.?" name="desc" rows="8">{{ old('desc')  }}</textarea>
                                        </div>
                                        </div>
                                        </div>

                                   <div class="col-sm-6">
                                        <div class="form-group">
                                        <div class="form-line">
                                            <label for="sleeve">Sleeve Or None:</label>
                                                <select name="sleeve"   class="form-control">
                                                    <option value="None"> None... </option>
                                                    @php
                                      $sleeves = ['full sleeve','helf sleeve','short sleeve','sleeveless'];
                                                     @endphp
                                                @foreach($sleeves as $sleeve)
                                                        <option value="{{$sleeve}}" {{ old('sleeve') == $sleeve ? 'selected' : ''  }}>{{$sleeve}}</option>
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
                                                    <option value="0" {{ old('cat_id') == 0 ? 'selected' : ''  }}> Main Product ... </option>
                                                @foreach($categories as $cat)
                                                        <option value="{{$cat->id}}" {{ old('cat_id') == $cat->id ? 'selected' : ''  }}>{{$cat->title}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                        </div>
                                        </div>
                                           <div class="col-sm-6">
                                            <label for="featured">Feature:</label>
                                            <div class="form-group">
                                                <input type="radio" value="1" name="featured" id="male" class="with-gap">
                                                <label for="male">YES</label>
                                                <input type="radio" checked value="0" name="featured" id="female" class="with-gap">
                                                <label for="female" class="m-l-20">NO</label>
                                            </div>
                                        </div>
                                           <div class="col-sm-6">
                                            <label for="diffrent_size">Diffrent Sizes Or Not:</label>
                                            <select class="form-control" name="diffrent_size">
                                              <option value="0">No</option>
                                              <option value="1">Yes</option>
                                            </select>
                                            <div class="form-group">
                                                <!-- <input type="radio" value="1" name="diffrent_size" id="diffrent_size1" class="with-gap"> -->
                                                <!-- <label for="male">YES</label> -->
                                                <!-- <input type="radio" checked  value="0" name="diffrent_size" id="diffrent_size2" class="with-gap"> -->
                                                <!-- <label for="female" class="m-l-20">NO</label> -->
                                            </div>
                                        </div>

                                           <div class="col-sm-9">
                                            <label for="featured">Image:</label>
                                            <div class="form-group">
                                         <input type="file" name="image">
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-3"><img width="100px" height="100px" src="" id="image_creat" class="image_creat" ></div> -->

                                           <div class="col-md-6">
                                               <label for="Tags">Select Tags:</label>
                                               <div class="btn-group bootstrap-select show-tick form-control">
                                                   <select name="tag[]" id="Tags" class="form-control show-tick" multiple="" tabindex="-98">
                                                       @foreach($tags as $ta)
                                                           <option value="{{$ta->id}}">{{$ta->name}}</option>

                                                       @endforeach
                                                   </select></div>

                                           </div>


                                           <button type="submit" class="btn btn-block btn-lg bg-black waves-effect">
                                               <i class="material-icons">save</i>
                                               <span>ADD</span></button>
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
