@section('site_name',$admin->first_name)
@extends('admin.layouts_RKh._app')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        <strong style="color: #0D0A0A">Your Profile</strong>
                        <br> <b>  Mr/s {{ auth()->user()->first_name  }}  </b>
                    </h2></div>
                <div class="col-md-6">

                    <ol class="breadcrumb breadcrumb-bg-black">
                        <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li class="active"><a href="#">#{{  $admin->first_name  }} </a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <img src="{{url('/backend/user_images/'.$admin->user_image)}}" width="150px" height="150px"  alt="AdminBSB - Profile Image">
                        </div>
                        <div class="content-area">
                            <h3>{{$admin->first_name}}</h3>
                            <p> {{ ! empty($admin->user_info->job_description)?$admin->user_info->job_description:'' }}</p>
                            <p> {{ ! empty($admin->user_info->position)?$admin->user_info->position:'' }}</p>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <form action="{{ route('admins.image',$admin->id)  }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('put') }}
                            <input type="file" name="image">
                            <button type="submit" class="btn btn-primary btn-lg waves-effect btn-block">Update</button>
                        </form>
                    </div>
                </div>

                <div class="card card-about-me">
                    <div class="header">
                        <h2>ABOUT {{  $admin->first_name }}</h2>
                    </div>
                    <div class="body">
                        <ul>
                            <li>
                                <div class="title">
                                    <i class="material-icons">location_on</i>
                                    Location
                                </div>
                                <div class="content">
                                    {{ ! empty($admin->usersinfos->country)?$admin->usersinfos->country:''}} ,{{ ! empty($admin->usersinfos->city)?$admin->usersinfos->city:''	  }} {{  ! empty($admin->usersinfos->state)?$admin->usersinfos->state:''  }}

                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">settings_phone</i>
                                    Phone
                                </div>
                                <div class="content">
                                    <a href="tel:{{! empty($admin->usersinfos->phone1)?$admin->usersinfos->phone1:''}}"> {{! empty($admin->usersinfos->phone1)?$admin->usersinfos->phone1:''}}</a> <a href="tel:{{! empty($admin->usersinfos->phone2)?$admin->usersinfos->phone2:''}}">{{ ! empty($admin->usersinfos->phone2)? ' , '. $admin->usersinfos->phone2:'' }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">notes</i>
                                    ZIP
                                </div>
                                <div class="content">
                                    {{ ! empty($admin->usersinfos->zip)?$admin->usersinfos->zip:'' }}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Home</a></li>
                                <li role="presentation" class=""><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">Change Information</a></li>
                                <li role="presentation" class=""><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">Change More Information</a></li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="home">
                                    {{--  products  --}}
                                    @if(! empty($admin->products))
                                        @foreach($admin->products as $key => $pro)
                                            <div class="panel panel-default panel-post">
                                                <div class="panel-heading">
                                                    <div class="media">

                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a href="#">{{ $admin->first_name  }}</a>
                                                            </h4>
                                                             Created Product  <b class="pull-right">  {{ $pro->created_at }}</b>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="post">
                                                        <div class="post-heading">

                                                            <h4><a href="{{  route('products.index')}}?id={{$pro->id}}">  title : {{ ! empty($pro->title)?$pro->title:'Mr/s' }}</a></h4>
                                                            <h5>short Description  : {{ $pro->short_desc }}</h5>
                                                            <p>  Description  : {{ $pro->desc }}</p>
                                                            <h6>  Price  : {{ $pro->price }}</h6>
                                                            <h6>  viewer  : {{ $pro->viewer }}</h6>
                                                            <h5> <a href="{{  route('categories.index')}}?id={{$pro->category->id}}">  Category  : {{ $pro->category->title }}</a></h5>

                                                            @if($pro->edit != 0)
                                                                <br>
                                                                <a href="{{route('admins.show',$pro->editor->id)}}}"> Edit By  {{$pro->editor->first_name}} {{$pro->editor->last_name}}  </a>   <b class="pull-right"> {{ $pro->updated_at }}</b>
                                                            @endif
                                                        </div>
                                                        <div class="post-content">
                                                            @if($pro->product_image !='default.png')
                                                                <img src="{{ url('backend/products_images/small/'.$pro->product_image)  }}" class="img-responsive">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    {{--  Category  --}}
                                    @if(! empty($admin->category))
                                        @foreach($admin->category as $key => $cat)
                                            <div class="panel panel-default panel-post">

                                                <div class="panel-heading">
                                                    <div class="media">

                                                        <div class="media-body">
                                                            <h4 class="media-heading">
                                                                <a href="#">{{ $admin->first_name  }} {{ $admin->last_name  }}</a>
                                                            </h4>
                                                            Created Category  <b class="pull-right">  {{ $cat->created_at }}</b>
                                                            @if($cat->edit != 0)
                                                                <br>
                                                                Edit By  {{$cat->editor->first_name}} {{$cat->editor->last_name}}  <b class="pull-right"> {{ $cat->updated_at }}
                                                                </b>@endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="post">
                                                        <div class="post-heading">
                                                            <p><a href="{{  route('categories.index')}}?id={{$cat->id}}">  title : {{ $cat->title }}</a></p>
                                                            <p>short Description  : {{ $cat->short_desc }}</p>
                                                        </div>

                                                    </div>
                                                </div>                                    </div>

                                        @endforeach
                                    @endif


                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile_settings">
                                    <form id="f_info_validation" class="form-horizontal" action="{{  route('admins.infos',$admin->id)  }}" method="post">
                                        @csrf
                                        {{ method_field('put') }}
                                        <div class="form-group">
                                            <label for="address" class="col-sm-4 control-label">Address</label>
                                            <div class="col-sm-8">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="address" name="address" value="{{ ! empty($admin->usersinfos->address)?$admin->usersinfos->address:'' }}"  placeholder="Address">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone1" class="col-sm-4 control-label">Phone</label>
                                            <div class="col-sm-8">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="phone1" name="phone1" value="{{ ! empty($admin->usersinfos->phone1)?$admin->usersinfos->phone1:'' }}" placeholder="Phone ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone2" class="col-sm-4 control-label"> Phone 2</label>
                                            <div class="col-sm-8">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="phone2" name="phone2" value="{{ ! empty($admin->usersinfos->phone2)?$admin->usersinfos->phone2:'' }}" placeholder="Other Phone *Option ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="zip" class="col-sm-4 control-label">ZIP</label>
                                            <div class="col-sm-8">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="zip" name="zip" value="{{ ! empty($admin->usersinfos->zip)?$admin->usersinfos->zip:'' }}" placeholder="ZIP">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="country" class="col-sm-4 control-label">Country</label>
                                            <div class="col-sm-8">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="country" name="country" value="{{ ! empty($admin->usersinfos->country)?$admin->usersinfos->country:'' }}"  placeholder="Country">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class="col-sm-4 control-label">City</label>
                                            <div class="col-sm-8">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="city" name="city" value="{{ ! empty($admin->usersinfos->city)?$admin->usersinfos->city:'' }}"  placeholder="City">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="state" class="col-sm-4 control-label">State</label>
                                            <div class="col-sm-8">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="state" name="state" value="{{ ! empty($admin->usersinfos->state)?$admin->usersinfos->state:'' }}"  placeholder="State">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">SAVE</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="change_password_settings">
                                    <form class="form-horizontal"  action="{{ route('admin.do_profile',$admin->id) }}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('put') }}
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 control-label">First Name</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="text" name="first_name" value="{{ $admin->first_name  }}" id="first_name" class="form-control" placeholder="First Name..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name" class="col-sm-3 control-label">Last Name</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="text" name="last_name" value="{{ $admin->last_name  }}" id="last_name" class="form-control" placeholder="Last Name..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-3 control-label">Email Adress</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="email" name="email" id="email"  value="{{ $admin->email  }}"  class="form-control" placeholder="E-mail Adress..">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-3 control-label">Password</label>
                                            <div class="col-sm-9">
                                                <div class="form-line">
                                                    <input type="password" name="password" id="password"  class="form-control" placeholder="Password..">
                                                    <input type="hidden" name="old_password" value="{{ $admin->password}}" >                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-danger">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
