@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','Add User')
<section class="content">
<div class="container-fluid">
            <div class="block-header">
                    <div class="row">
                      <div class="col-md-6">
                                         <h2>
                                         Add User
                                          <small>  {{ auth()->user()->first_name  }}  </small>
                                        </h2>
                                        </div>
                      <div class="col-md-6">

                        <ol class="breadcrumb breadcrumb-bg-black">
                         <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('users.index')  }}">Users</a></li>
                                                <li class="active"><a href="#"> Add User</a></li>

                                                    </ol>
                      </div>
                    </div>

            </div>
            <!-- Basic Examples -->

           <div class="row clearfix">
          <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">

                               {{ csrf_field() }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="card">
                                   <div class="header">
                                       <h2>
                                         Add User
                                       </h2>
                                   </div>
                                   <div class="body">
                                       <div class="row clearfix">
                                           <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                       <input type="text" name="first_name" class="form-control" placeholder="First Name">

                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                       <input type="text" name="last_name" class="form-control" placeholder="Last Name">

                                                   </div>
                                               </div>
                                           </div>

                                           <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                               <input type="email" name="email" class="form-control" autocomplete="off" placeholder="E-mail Address">
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="row clearfix">
                                           <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                       <input type="password" name="password" class="form-control" placeholder="Password">
                                                   </div>
                                               </div>
                                           </div>
                                                <div class="col-sm-6">
                                               <div class="form-group">
                                                   <div class="form-line">
                                                       <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
                                                   </div>
                                               </div>
                                           </div>
                                           <button type="submit" class="btn btn-block btn-lg bg-black waves-effect">
                                               <i class="material-icons">save</i>
                                               <span>ADD</span>
                                           </button>
{{--                                           <div class="col-sm-6">--}}
{{--                                               <div class="form-group">--}}
{{--                                                   <div class="form-line">--}}
{{--                                                       <input type="file" name="image" class="form-control">--}}
{{--                                                   </div>--}}
{{--                                               </div>--}}
{{--                                           </div>--}}
                                       </div>
                            </div>
                               </div>
                           </div>


           </form>

            </div>
</div>
</section>

@endsection
