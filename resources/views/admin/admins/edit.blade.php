@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','Edit Admin')
<section class="content">
<div class="container-fluid">
            <div class="block-header">
                    <div class="row">
                      <div class="col-md-6">
                                         <h2>
                                         Edit Admin
                                          <small>  {{ auth()->user()->first_name  }}  </small>
                                         </h2></div>
                          <div class="col-md-6">

                        <ol class="breadcrumb breadcrumb-bg-black">
                         <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('admins.index')  }}"><i class="material-icons">security</i>Admins</a></li>
                                                <li class="active"><a href="#"> Edit Admin</a></li>

                                                    </ol>
                    </div>
            </div>
</div>
            <!-- Basic Examples -->

               <div class="row clearfix">
                 <form action="{{ route('admins.update', $admin->id) }}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('put') }}
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                   <div class="card">
                                       <div class="header">
                                           <h2>

                                           Edit Admin
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
                                        <a href="#{{$model}}_with_icon_title" data-toggle="tab" aria-expanded="false">
                                         <i class="material-icons">settings</i>   {{  $model   }}
                                        </a>
                                </li>
                          @endforeach



                                                           </ul>

                                                           <!-- Tab panes -->
                                                           <div class="tab-content">
                                        @foreach ($models as $index=>$model)
                                       <div role="tabpanel" class="tab-pane fade {{$index==0?'active in':''}}" id="{{$model}}_with_icon_title">
                                           <strong> {{ $model  }}</strong> <br>
                                       @foreach ($maps as $map)
                                               <div class="demo-radio-button"  style="display: inline;margin-right: 5px;">

                                        <input name="permissions[]" {{ $admin->hasPermission($map . '_' . $model) ? 'checked' : '' }}  value="{{ $map . '_' . $model }}" type="checkbox" id="{{ $map . '_' . $model }}" class="radio-col-orange">
                                   <label for="{{ $map . '_' . $model }}"> {{ $map  }}</label>
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
                      <i class="material-icons">mode_edit</i>
                      <span> Update </span>
                      </button>
                      </div>
                  </div>
               </div>
               </form>

                </div>
    </div>
</section>

@endsection
