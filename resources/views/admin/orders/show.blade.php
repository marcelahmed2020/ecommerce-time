@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','# '.$order->first_name.' '.$order->last_name)
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                         <a href="{{route('users.show',$order->user_id)}}">   # Name: {{$order->first_name}} {{$order->last_name}}</a>
                        <small>  {{ auth()->user()->name  }}  </small>
                    </h2>
                </div>
                <div class="col-md-6">

                    <ol class="breadcrumb breadcrumb-bg-black">
                        <li><a href="{{ route('dashboard')  }}"><i class="material-icons">home</i>Dashboard</a></li>
                        <li><a href="{{ route('orders.index')  }}" class="font_l">   Ordera</a></li>
                        <li class="active"><a  href="{{route('users.show',$order->user_id)}}" class="font_l">SHOW #{{$order->first_name}} {{$order->last_name}}</a></li>

                    </ol>
                </div>
            </div>

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                      #Info
                        </h2>

                    </div>
                    <div class="body">
                        <div class="list-group">
                            <a href="{{route('users.show',$order->user_id)}}" class="list-group-item active">Name:          {{$order->first_name}} {{$order->last_name}}                  </a>
                            <a href="{{route('users.show',$order->user_id)}}" class="list-group-item">Email:          {{$order->user_email}}</a>
                            <a href="javascript:void(0);" class="list-group-item">Phone :{{$order->phone1}}</a>
                            <a href="javascript:void(0);" class="list-group-item">Payment Method: {{$order->payment_method}}</a>
                            <form  class="list-group-item" action="{{route('orders.udate_orders',$order->id)}}" method="post">
                                @csrf
                                {{ method_field('put') }}
                                <a href="javascript:void(0);">Order Status ({{$order->order_status}}):
                                <select class="form-control" name="order_status">
                                    <option value="new" {{$order->order_status == 'new' ? 'Selected':''}}>New</option>
                                    <option value="Pendding" {{$order->order_status == 'Pendding' ? 'Selected':''}}>Pendding</option>
                                    <option value="In Process" {{$order->order_status == 'In Process' ? 'Selected':''}}>In Process</option>
                                    <option value="Shipped" {{$order->order_status == 'Shipped' ? 'Selected':''}}>Shipped</option>
                                    <option value="Delivered" {{$order->order_status == 'Delivered' ? 'Selected':''}}>Delivered</option>
                                    <option value="Cannceld" {{$order->order_status == 'Cannceld' ? 'Selected':''}}>Cannceld</option>
                                </select>


                                <div class="form-group">
                                    <label for="arrived">Arrived To Where *</label>
                                    <input  class="form-control" type="text" name="arrived" name="arrived" value="{{$order->arrived}}" placeholder="Arrtive to">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg waves-effect">Update</button>
                                </a>
                            </form>
                            {{--                            <a href="javascript:void(0);" class="list-group-item">Order Products: {{$order->order_products->count()}} </a>--}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            #Address
                        </h2>
                    </div>
                    <div class="body">
                        <div class="list-group">

                            <a href="javascript:void(0);" class="list-group-item">Country & City: {{$order->country}} ,{{$order->city}}</a>
                            <a href="javascript:void(0);" class="list-group-item">State:{{$order->state}} & Zip : {{$order->zip}} </a>
                            <a href="javascript:void(0);" class="list-group-item">Street Address:{{$order->address}}</a>
                            <a href="javascript:void(0);" class="list-group-item">Coupon Code :{{$order->coupon_code}}</a>
                            <a href="javascript:void(0);" class="list-group-item">Coupon Amount :{{$order->coupon_amount}}</a>

                            <a href="javascript:void(0);" class="list-group-item">Shiping Charges :$ {{$order->shiping_charges}}</a>
                            <a href="javascript:void(0);" class="list-group-item">Total Price :$ {{$order->grand_total}}</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <a href="{{route('users.show',$billing->id)}}"> Billing Info </a>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                <div class="panel-group" id="accordion_2" role="tablist" aria-multiselectable="true">

                                    <div class="panel panel-success">
                                        <div class="panel-heading" role="tab" id="headingTwo_2">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_2" href="#collapseTwo_2" aria-expanded="false" aria-controls="collapseTwo_2">
                                                     # {{$billing->first_name }} {{$billing->last_name }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo_2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_2">
                                            <div class="panel-body">
                                                <h4><a href="{{route('users.show',$billing->id)}}"> Name : {{$billing->first_name }} {{$billing->last_name }}</a></h4>
                                                <h4>Email : {{$billing->email }}</h4>
                                                <h5> Country : {{$billing->usersinfos->country }}</h5>
                                                <h6> City : {{$billing->usersinfos->city }}</h6>
                                                <h6> State : {{$billing->usersinfos->state }}</h6>
                                                <h6> Zip : {{$billing->usersinfos->zip }}</h6>
                                                <h6> Street Address : {{$billing->usersinfos->address }}</h6>
                                                <h6> Phone : {{$billing->usersinfos->phone1 }}</h6>
                                                <h6> Other Phone : {{$billing->usersinfos->phone2 != 0 ?:' Not Have' }}</h6>

                                            </div>
                                        </div>
                                    </div>
                                   </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>     <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Shipping Info
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                <div class="panel-group" id="accordion_22" role="tablist" aria-multiselectable="true">

                                    <div class="panel panel-success">
                                        <div class="panel-heading" role="tab" id="headingTwo_2">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_22" href="#collapseTwo_22" aria-expanded="false" aria-controls="collapseTwo_2">
                                                    # {{$shipping->ship_first_name }} {{$shipping->ship_last_name }}
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo_22" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_2">
                                            <div class="panel-body">
                                                 <h4>Name : {{$shipping->ship_first_name }} {{$shipping->ship_last_name }}</h4>
                                                 <h4>Email : {{$shipping->ship_email }}</h4>
                                                <h5> Country : {{$shipping->ship_country }}</h5>
                                                <h6> City : {{$shipping->ship_city }}</h6>
                                                <h6> State : {{$shipping->ship_state }}</h6>
                                                <h6> Zip : {{$shipping->ship_zip }}</h6>
                                                <h6> Street Address : {{$shipping->ship_address }}</h6>
                                                <h6> Phone : {{$shipping->ship_phone1 }}</h6>

                                            </div>
                                        </div>
                                    </div>
                                   </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
        <div class="body table-responsive">
            <!-- <div class="body">  s<div> -->
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                            <tr role="row">
                                <th  class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 30px;">
                                    #</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                    Title</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                    Code</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                    Quntity</th>
    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                    Size</th>  <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                    Price</th>
    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                    Prodect Status</th>

                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 150px;">
                                    Action</th></tr>
                            </thead>
                            <tbody>
                            @foreach($order->order_products as $key => $ord)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td><a href="{{route('products.show',$ord->id)}}">{{$ord->title}}</a> </td>
                                    <td><a href="{{route('products.show',$ord->id)}}"> {{$ord->code}}</a></td>
                                    <td>{{$ord->quntity}}</td>
                                    <td>{{$ord->size}}</td>
                                    <td>$ {{$ord->price}}</td>
                                    <td>{{$ord->status == 1?'Exist':'Not Exist'}}</td>
                                    <td>
                                        <div class="button-demo">
                                        <a href="{{ route('products.show',$ord->id)  }}" class="btn btn-default waves-effect"><i class="material-icons">pageview</i></a>
                                        @permission('delete_categories')
                                        <form   style="margin:0px 2px  ;display:inline"
                                                action="{{ route('orders_prod.destroy',$ord->id)  }}" id="date-form-sliders-{{ $ord->id}}"
                                                method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>

                                        <a   class="btn btn-danger waves-effect" onclick="
                                            if(confirm('Are You Sure, You Want To Delete This Order Product !?')){
                                            event.preventDefault();document.getElementById('date-form-sliders-{{ $ord->id}}').submit()
                                            }else{
                                            event.preventDefault();
                                            }"  href="{{ route('orders_prod.destroy',$ord->id)  }}"><i class="material-icons">delete</i>   </a>
                                        </div>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

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
