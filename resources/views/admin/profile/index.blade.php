@extends('admin.layouts_RKh._app')
@section('site_name','Profial')
@section('content')
<section class="content">
<div class="container-fluid">
            <div class="block-header">
                    <div class="row">
                      <div class="col-md-6">
                                         <h2>
                                         Profile
                                          <small>  {{ auth()->user()->name  }}  </small>
                                        </h2>
                                        </div>
                      <div class="col-md-6">

                        <ol class="breadcrumb breadcrumb-bg-black">
                         <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                       <li class="active"><a href="#"><i class="material-icons">mode_edit</i> Profile </a></li>

                                                    </ol>
                      </div
                    </div>

            </div>
            <!-- Basic Examples -->

           <div class="row clearfix">
          <form action="{{ route('admin.do_profile',$user->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                                                                             {{ method_field('put') }}

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                               <div class="card">
                                   <div class="body">
                                       <div class="row clearfix">
                                           <div class="col-sm-12">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                       <label for="name">Name</label>
                                                       <input type="text" name="name" value="{{ $user->name  }}" id="name" class="form-control" placeholder="Name..">
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-sm-12">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                       <label for="email">E-mail Adress</label>
                                                       <input type="email" name="email" id="email"  value="{{ $user->email  }}"  class="form-control" placeholder="E-mail Adress..">
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-sm-12">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                       <label for="password">password</label>
                                                       <input type="password" name="password" id="password"  class="form-control" placeholder="Password..">
                                                       <input type="hidden" name="old_password" value="{{ $user->password}}" >
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-sm-12">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                   <label  for="image">Profial Image</label>
                                                       <input type="file" name="image" id="image" class="form-control">
                                                         @if(! empty($user->image))
                                                       <input type="hidden" name="old_image" value="{{ $user->image  }}" class="form-control">
                                                        <img src="{{ url('backend/user_images/'.$user->image) }}" width="100px" height="100px">
                                                          @endif
                                                   </div>
                                               </div>
                                           </div>
                                           <button type="submit" class="btn btn-block btn-lg btn-danger waves-effect">
                                                              <i class="material-icons">save</i>
                                                              <span>Update Info</span>
                                                              </button>

                                        </div>
                            </div>
                               </div>
                           </div>

           </form>

            </div>
      </div>
</section>

@endsection
