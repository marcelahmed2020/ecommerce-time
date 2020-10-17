@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','Edit User')
<section class="content">
<div class="container-fluid">
            <div class="block-header">
                    <div class="row">
                      <div class="col-md-6">
                                         <h2>
                                         Edit User
                                          <small>  {{ auth()->user()->first_name  }}  </small>
                                         </h2></div>
                          <div class="col-md-6">

                        <ol class="breadcrumb breadcrumb-bg-black">
                         <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('users.index')  }}">Users</a></li>
                                                <li class="active"><a href="#"> Edit User</a></li>

                                                    </ol>
                    </div>
            </div>
</div>
            <!-- Basic Examples -->

               <div class="row clearfix">
                 <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('put') }}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                   <div class="card">
                                       <div class="header">
                                           <h2>

                                           Edit User
                                           </h2>

                                       </div>
                                       <div class="body">
                                           <div class="row clearfix">
                                               <div class="col-sm-6">
                                                   <div class="form-group">
                                                       <div class="form-line">
                                                           <input type="text" name="first_name" value="{{ $admin->first_name  }}" class="form-control" placeholder="First Name ">

                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-sm-6">
                                                   <div class="form-group">
                                                       <div class="form-line">
                                                           <input type="text" name="last_name" value="{{ $admin->last_name  }}" class="form-control" placeholder="Last Name ">

                                                       </div>
                                                   </div>
                                               </div>

                                               <div class="col-sm-6">
                                                   <div class="form-group">
                                                       <div class="form-line">
                                   <input type="email" name="email"  value="{{ $admin->email  }}" class="form-control" autocomplete="off" placeholder="Email Address">
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row clearfix">
                                               <div class="col-sm-6">
                                                   <div class="form-group">
                                                       <div class="form-line">
                                                           <input type="password" name="password" class="form-control" placeholder="Password">
                                                           <input type="hidden" name="old_password" value="{{ $admin->password  }}">
                                                       </div>
                                                   </div>
                                               </div>

                                               <button type="submit" class="btn btn-block btn-lg bg-black waves-effect">
                                                   <i class="material-icons">mode_edit</i>
                                                   <span> Update </span>
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
