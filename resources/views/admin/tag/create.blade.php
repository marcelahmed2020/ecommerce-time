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
                        <li><a href="{{ route('tag.index')  }}" class="font_l">   Tags</a></li>
                       <li class="active"><a href="#" class="font_l">Add</a></li>

                                                    </ol>
                      </div>
                    </div>

            </div>
            <!-- Basic Examples -->
           <div class="row clearfix">
          <form action="{{ route('tag.store') }}" id="form_validation" method="post" enctype="multipart/form-data">

                               {{ csrf_field() }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="card">
                                   <div class="header">
                                       <h2>
                                         Add Tag
                                       </h2>
                                   </div>
                                   <div class="body">
                                       <div class="row clearfix">
                                           <div class="col-sm-12">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                        <label for="name">آName  </label>
                                                       <input type="text" name="name" value="{{ old('name')  }}"  class="form-control" placeholder="name.?">

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
         'name': {
     required: true,
     minlength: 2
     },
     'short_desc': {
     required: true,
     minlength: 2
     }
     },
     messages: {
         name: 'This field is required',
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
