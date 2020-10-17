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
                        <li><a href="{{ route('charges.index')  }}" class="font_l">   Charges</a></li>
                       <li class="active"><a href="#" class="font_l">Add</a></li>

                                                    </ol>
                      </div>
                    </div>

            </div>
            <!-- Basic Examples -->
           <div class="row clearfix">
          <form action="{{ route('charges.store') }}" id="form_validation" method="post" enctype="multipart/form-data">

                               {{ csrf_field() }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="card">
                                   <div class="header">
                                       <h2>
                                         Add Charge
                                       </h2>
                                   </div>
                                   <div class="body">
                                       <div class="row clearfix">
                                           <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                        <label for="Country">Country </label>
                                                       <select name="Country"  class="form-control" >
                                                           @foreach($countries as $country)
                                                           <option value="{{$country->name}}">{{$country->name}}</option>
                                                             @endforeach
                                                       </select>

                                                   </div>
                                               </div>
                                           </div>
 <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                        <label for="City">City </label>
                                                       <input type="text" name="City" value="{{ old('City')  }}"  class="form-control" placeholder="City.?">

                                                   </div>
                                               </div>
                                           </div>
 <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                        <label for="charges">charges </label>
                                                       <input type="number" name="charges" value="{{ old('charges')  }}"  class="form-control" placeholder="charges.?">

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


     </script>
 @endsection
@endsection
