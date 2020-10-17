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
                        <li><a href="{{ route('cms.index')  }}" class="font_l">   POLICE</a></li>
                       <li class="active"><a href="#" class="font_l">Add</a></li>

                                                    </ol>
                      </div>
                    </div>

            </div>
            <!-- Basic Examples -->
           <div class="row clearfix">
          <form action="{{ route('cms.store') }}" id="form_validation" method="post" enctype="multipart/form-data">

                               {{ csrf_field() }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="card">
                                   <div class="header">
                                       <h2>
                                         Add POLICE
                                       </h2>
                                   </div>
                                   <div class="body">
                                       <div class="row clearfix">
                                         <div class="col-sm-6">
                                             <div class="form-group">
                                                 <div class="form-line">
                                                      <label for="title">Title </label>
                                                     <input type="text" name="title" value="{{ old('title')  }}"  class="form-control" placeholder="title.?">

                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-group">
                                                 <div class="form-line">
                                                      <label for="meta_title">Meta Title </label>
                                                     <input type="text" name="meta_title" value="{{ old('meta_title')  }}"  class="form-control" placeholder="Meta Title.?">

                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="form-group">
                                                 <div class="form-line">
                                                      <label for="link">Link </label>
                                                     <input type="text" name="link" value="{{ old('link')  }}"  class="form-control" placeholder="Link.?">

                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                           <div class="form-group">
                                             <div class="form-line">
                                               <input type="file" name="image" class="form-control">
                                             </div>
                                           </div>
                                         </div>

                                      <div class="col-sm-12">
                                      <div class="form-group">
                                      <div class="form-line">
                                          <label for="description"> Description</label>
                                           <textarea  id="description"  class="form-control" placeholder="Description.?" name="description" rows="6">{{ old('description')  }}</textarea>
                                      </div>
                                      </div>
                                      </div>



                                      <div class="col-sm-12">
                                      <div class="form-group">
                                      <div class="form-line">
                                       <label for="meta_description"> Meta Description</label>
                                        <textarea  id="meta_description"  class="form-control" placeholder="Title Description.?" name="meta_description" rows="6">{{ old('meta_description')  }}</textarea>
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
       'title': {
       required: true,
       minlength: 2
       },
       'meta_title': {
       required: true,
       minlength: 2
       },
       'link': {
       required: true,
       minlength: 2
       },
       'description': {
       required: true,
       minlength: 2
       },
       'meta_description': {
       required: true,
       minlength: 2
       },


     },
     messages: {
         title: 'This field is required',
         meta_title: 'This field is required',
         link: 'This field is required',
         description: 'This field is required',
         meta_description: 'This field is required',

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
