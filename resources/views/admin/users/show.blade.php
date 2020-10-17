@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name',"User / ". $user->first_name)
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        LOOK AT <strong style="color: #0D0A0A">{{  $user->first_name }} {{  $user->last_name }} </strong>
                       <br><br> <b>  {{! empty(auth()->user()->usersinfos->title)?auth()->user()->usersinfos->title:'Mr/s  ' }} {{ auth()->user()->first_name  }} {{ auth()->user()->last_name  }}  </b>
                    </h2></div>
                <div class="col-md-6">

                    <ol class="breadcrumb breadcrumb-bg-black">
                        <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('users.index')  }}">Users</a></li>
                        <li class="active"><a href="#">#{{  $user->first_name  }} </a></li>
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

                            <img src="{{url('/backend/user_images/'.$user->user_image)}}" width="150px" height="150px">

                        </div>
                        <div class="content-area">

                             <h3>{{ ! empty($user->usersinfos->title)?$user->usersinfos->title:'Mr/S' }}  {{ $user->first_name}}- {{ $user->last_name}}</h3>
                        </div>
                    </div>
                    @permission('update_admins')
                    <div class="profile-footer">
                        <form action="{{ route('users.image',$user->id)  }}" method="post" enctype="multipart/form-data">
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
                        <h2>ABOUT {{  $user->first_name }} </h2>
                    </div>
                    <div class="body">
                        <ul>
                            <li>
                                <div class="title">
                                    <i class="material-icons">location_on</i>
                                    Location
                                </div>
                                <div class="content">
                                    {{ ! empty($user->usersinfos->country)?$user->usersinfos->country:''}} ,{{ ! empty($user->usersinfos->city)?$user->usersinfos->city:''	  }} {{  ! empty($user->usersinfos->state)?$user->usersinfos->state:''  }}

                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">settings_phone</i>
                                    Phone
                                </div>
                                <div class="content">
                                    <a href="tel:{{! empty($user->usersinfos->phone1)?$user->usersinfos->phone1:''}}"> {{! empty($user->usersinfos->phone1)?$user->usersinfos->phone1:''}}</a> <a href="tel:{{! empty($user->usersinfos->phone2)?$user->usersinfos->phone2:''}}">{{ ! empty($user->usersinfos->phone2)? ' , '. $user->usersinfos->phone2:'' }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <i class="material-icons">notes</i>
                                    ZIP
                                </div>
                                <div class="content">
                                    {{ ! empty($user->usersinfos->zip)?$user->usersinfos->zip:'' }}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">

                    <div class="col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                   Orders  ({{ $user->orders->count() }})
                                </h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                        <div class="panel-group" id="accordion_17" role="tablist" aria-multiselectable="true">
                                            @if($user->orders->count() > 0)
                                                @foreach($user->orders()->latest()->get() as $order)
                                            <div class="panel panel-col-cyan">
                                                <div class="panel-heading" role="tab" id="headingTwo_17_{{$order->id}}">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_17" href="#collapseTwo_17_{{$order->id}}" aria-expanded="false" aria-controls="collapseTwo_17_{{$order->id}}">
                                                            <i class="material-icons">flight_takeoff</i>  {{$order->first_name}}  {{$order->last_name}}  <p class="pull-right">{{$order->created_at->diffForHumans()}}</p>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo_17_{{$order->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_17_{{$order->id}}">
                                                    <div class="panel-body">
                                                        <div class="alert alert-info">
                                                            <h5><a href="{{ route('orders.show',$order->id)  }}">Order</a></h5>
                                                            <p>Email : {{$order->user_email}} / Country:{{$order->country}} / Address:{{$order->address}}</p>
                                                            <p>City : {{$order->city}} / ZIP:{{$order->zip}}/ State:{{$order->state}}</p>
                                                            <p>Arrived : {{$order->arrived}} / Phone:{{$order->phone1}}/ Shiping Charges:{{$order->shiping_charges}}</p>
                                                            <p>Coupon Code : {{$order->coupon_code}} / Coupon Amount:{{$order->coupon_amount}}/ Order Status:{{$order->order_status}}</p>
                                                            <p>Payment Method : {{$order->payment_method}} / Total:{{$order->grand_total}} $</p>
                                                            <table class="table table-condensed">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Title</th>
                                                                    <th>code</th>
                                                                    <th>quntity</th>
                                                                    <th>price</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($order->order_products as $key => $order_products)
                                                                <tr>
                                                                    <th scope="row">{{$key + 1}}</th>
                                                                    <td><a href="{{ route('products.show',$order_products->product_id)  }}"> {{$order_products->title}}</a></td>
                                                                    <td> <p title="{{$order_products->code}}"><a href="{{ route('products.show',$order_products->product_id)  }}"> {{substr($order_products->code,0,4)}}</a></p></td>
                                                                    <td>{{$order_products->quntity}}</td>
                                                                    <td>{{$order_products->price}} $</td>

                                                                </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                @endforeach
                                             @else
                                                Not Have Order(s)
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                    <div class="panel-group full-body" id="accordion_19" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Carts  ({{ $user->carts->count() }})
                                </h2>
                            </div>
                            <div class="body">
                                @if($user->carts->count() > 0)
                                    @foreach($user->carts()->latest()->get() as $cart)
                         <div class="panel panel-col-cyan">
                            <div class="panel-heading" role="tab" id="headingTwo_19_{{$cart->id}}">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo_19_{{$cart->id}}" aria-expanded="false" aria-controls="collapseTwo_19_{{$cart->id}}">
                                        <i class="material-icons">shopping_cart</i> {{$cart->title}} <p class="pull-right">{{$cart->created_at->diffForHumans()}}</p>

                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo_19_{{$cart->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_19_{{$cart->id}}">
                                <div class="panel-body">
                                    <p> <a href="{{ route('products.show',$cart->product_id)  }}">Price:   {{$cart->price}} $</a></p>
                                    <p> <a href="{{ route('products.show',$cart->product_id)  }}">Code:{{$cart->code}}</a></p>
                                    <p><a href="{{ route('products.show',$cart->product_id)  }}">{{$cart->short_desc}}</a></p>
                                </div>
                            </div>
                        </div>
                                    @endforeach
                                @else
                                    Not Have cart(s)
                                @endif

                    </div>
                    </div>
                </div>

            </div>
                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                    <div class="panel-group full-body" id="accordion_19" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Wishlist  ({{ $user->wishlist->count() }})
                                </h2>
                            </div>
                            <div class="body">
                                @if($user->wishlist->count() > 0)
                                    @foreach($user->wishlist()->latest()->get() as $cart)
                         <div class="panel panel-col-cyan">
                            <div class="panel-heading" role="tab" id="headingTwo_19_{{$cart->id}}">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo_19_1_{{$cart->id}}" aria-expanded="false" aria-controls="collapseTwo_19_1_{{$cart->id}}">
                                        <i class="material-icons">star_border</i> {{$cart->title}} <p class="pull-right">{{$cart->created_at->diffForHumans()}}</p>

                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo_19_1_{{$cart->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_19_1_{{$cart->id}}">
                                <div class="panel-body">
                                    <p> <a href="{{ route('products.show',$cart->product_id)  }}">Price:   {{$cart->price}} $</a></p>
                                    <p> <a href="{{ route('products.show',$cart->product_id)  }}">Code:{{$cart->code}}</a></p>
                                    <p><a href="{{ route('products.show',$cart->product_id)  }}">{{$cart->short_desc}}</a></p>
                                </div>
                            </div>
                        </div>
                                    @endforeach
                                @else
                                    Not Have cart(s)
                                @endif

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
