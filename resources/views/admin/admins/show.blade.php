@extends('admin.layouts_RKh._app')
@section('content')
{{--@section('site_name',$admin->name)--}}
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        LOOK AT <strong style="color: #0D0A0A">{{  $admin->first_name }} {{  $admin->last_name }} </strong>
                       <br><br> <b>  {{! empty(auth()->user()->usersinfos->title)?auth()->user()->usersinfos->title:'Mr/s  ' }} {{ auth()->user()->first_name  }} {{ auth()->user()->last_name  }}  </b>
                    </h2></div>
                <div class="col-md-6">

                    <ol class="breadcrumb breadcrumb-bg-black">
                        <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('admins.index')  }}"><i class="material-icons">security</i>Admins</a></li>
                        <li class="active"><a href="#">#{{  $admin->first_name  }} </a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-4">
                <div class="card profile-card">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">

                            <img src="{{url('/backend/user_images/'.$admin->user_image)}}" width="150px" height="150px">

                        </div>
                        <div class="content-area">

                             <h3>{{ ! empty($admin->usersinfos->title)?$admin->usersinfos->title:'Mr/S' }}  {{ $admin->first_name}}- {{ $admin->last_name}}</h3>
                        </div>
                    </div>
                    @permission('update_admins')
                    <div class="profile-footer">
                        <form action="{{ route('admins.image',$admin->id)  }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('put') }}
                               <input type="file" name="image">
                            <button type="submit" class="btn btn-primary btn-lg waves-effect btn-block">Update</button>
                        </form>
                    </div>
                    @endpermission
                </div>

                <div class="card card-about-me">
                    <div class="header">
                        <h2>ABOUT {{  $admin->first_name }} </h2>
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
            <div class="col-xs-12 col-sm-8">
                <div class="card">
                    <div class="body">
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">Home</a></li>
                                @permission('update_admins')
                                <li role="presentation" class=""><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">Profile Settings</a></li>
                                @endpermission
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
                                @permission('update_admins')
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
                                @endpermission
      </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@section('js_conent')
    <script>
        $(function () {
            $('#f_info_validation').validate({
                rules: {
                    'address': {
                        required: true,
                        minlength: 2
                    },
                    'phone1': {
                        required: true,
                        minlength: 2
                    },'phone2': {
                        required: true,
                        minlength: 2
                    },
                    'zip': {
                        required: true,
                        minlength: 2
                    },
                    'country': {
                        required: true,
                        minlength: 2
                    },'city': {
                        required: true,
                        minlength: 2
                    },
                    'state': {
                        required: true,
                        minlength: 2
                    }
                },
                messages: {

                },
                // highlight: function (input) {
                //     $(input).parents('.form-line').addClass('error');
                // },
                // unhighlight: function (input) {
                //     $(input).parents('.form-line').removeClass('error');
                // },
                // errorPlacement: function (error, element) {
                //     $(element).parents('.form-group').append(error);
                // }
            });
        });
    </script>
@endsection
@endsection
