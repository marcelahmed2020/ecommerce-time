@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','Add Admin')
<section class="content">
<div class="container-fluid">
            <div class="block-header">
                    <div class="row">
                      <div class="col-md-6">
                                         <h2>
                                         Add Admin
                                          <small>  {{ auth()->user()->first_name  }}  </small>
                                        </h2>
                                        </div>
                      <div class="col-md-6">

                        <ol class="breadcrumb breadcrumb-bg-black">
                         <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('admins.index')  }}"><i class="material-icons">security</i>Admins</a></li>
                                                <li class="active"><a href="#"> Add Admin</a></li>

                                                    </ol>
                      </div>
                    </div>

            </div>
            <!-- Basic Examples -->

           <div class="row clearfix">
          <form action="{{ route('admins.store') }}" method="post" enctype="multipart/form-data">

                               {{ csrf_field() }}
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="card">
                                   <div class="header">
                                       <h2>
                                         Add Admin
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
                           @role('super_admin')
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                               <div class="card">
                                                   <div class="header">
                                                       <h2>
                                                           Permissions
                                                       </h2>

                                                   </div>
                                                   <div class="body">

                                @php
                                    $models = ['admins','users','products','categories','sliders','services','orders','clients','about','portfolio','subscribe','settings',   'trash'];
                                  $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                                       <!-- Nav tabs -->
                                                       <ul class="nav nav-tabs" role="tablist">
                      @foreach ($models as $index=>$model)
                            <li role="presentation" class="{{ $index == 0 ? 'active' : ''  }}">
                                    <a   href="#{{$model}}_with_icon_title" data-toggle="tab" aria-expanded="false">
                                     <i class="material-icons">settings</i> {{ $model  }}
                                    </a>
                            </li>
                      @endforeach
                                                       </ul>
                                                       <!-- Tab panes -->
                                                       <div class="tab-content">
                                    @foreach ($models as $index=>$model)
                                   <div role="tabpanel" class="tab-pane fade {{$index==0?'active in':''}}" id="{{$model}}_with_icon_title">
                                       <b>  {{ $model  }} Permissions</b> <br>
                                   @foreach ($maps as $map)
                                   <div class="demo-radio-button"  style="display: inline;margin-right: 5px;">
                                    <input name="permissions[]" value="{{ $map . '_' . $model }}" type="checkbox" id="{{ $map . '_' . $model }}" class="radio-col-orange">
                               <label for="{{ $map . '_' . $model }}" style="background-color: black;color: #fff;margin: 9px auto;"> {{ $map }} </label>
                               </div>
                                         @endforeach

                                   </div>
                                   @endforeach

                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           @endrole
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="card">
               <div class="body"><button type="submit" class="btn btn-block btn-lg bg-black waves-effect">
                  <i class="material-icons">save</i>
                  <span>ADD</span>
                  </button>
                  </div>
              </div>
           </div>
           </form>

            </div>
</div>
</section>

@endsection
