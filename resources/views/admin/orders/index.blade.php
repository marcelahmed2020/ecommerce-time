@extends('admin.layouts_RKh._app')
@section('content')
@section('site_name','Orders')
<section class="content">
    <div class="container-fluid">

        <div class="block-header">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        Orders
                        <small>  {{ auth()->user()->name  }} </small>
                    </h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb breadcrumb-bg-black">
                        <li><a href="{{ route('dashboard')  }}">
                                <i class="material-icons">home</i> Dashboard</a></li>
                        <li class="active"> <a href="#" class="font_l">  Orders </a></li>
                    </ol>



                </div>
            </div>

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <strong><?php if (request()->id): ?>
                            <a href="{{ route('orders.index')  }}">Back</a>
                            <?php endif; ?></strong>
                        <h2>


                            @permission('create_categories')
                            <a  href="{{ route('orders.create')}}"  title=""  class="btn btn-primary"> <i class="material-icons">plus_one</i> ADD Orders</a>

                            @endpermission
                        </h2>

                    </div>
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
                                               Customer Name / Email </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                Products</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                Payment Method</th>

                                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                Order Status</th>  <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">
                                                Total Price</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 150px;">
                                                Action</th></tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $key => $order)
                                            <tr>

                                                <td class="sorting_1">{{ $key + 1  }}</td>
                                                <td><a href="{{route('users.show',$order->user_id)}}">{{  $order->first_name  }} {{$order->last_name}}</a> <br>{{$order->user_email}}  </td>
                                                <td>
                                                    @foreach($order->order_products as $order_product)
                                                        <a href="{{route('products.show',$order_product->product_id)}}">{{$order_product->code}}</a>
                                                    @endforeach
                                                </td>
                                                <td><a href="{{route('orders.show',$order->id)}}">{{  $order->payment_method  }}</a></td>

                                                <td>{{ $order->order_status  }}</td>
                                                <td>$ {{ $order->grand_total  }}</td>


                                                <td>
                                                    <a href="{{ route('orders.show',$order->id)  }}" class="btn btn-primary"><i class="material-icons">pageview</i></a>
                                                    @permission('delete_categories')
                                                    <form   style="margin:0px 2px  ;display:inline"
                                                            action="{{ route('orders.destroy',$order->id)  }}" id="date-form-sliders-{{ $order->id}}"
                                                            method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>

                                                    <a class="btn btn-danger btn-sm"  onclick="
                                                        if(confirm('Are You Sure, You Want To Delete This Category!?')){
                                                        event.preventDefault();document.getElementById('date-form-sliders-{{ $order->id}}').submit()
                                                        }else{
                                                        event.preventDefault();
                                                        }"  href="{{ route('orders.destroy',$order->id)  }}"><i class="material-icons">delete</i>   </a>
                                                    @endpermission
                                                    <br>
                                                     <a href="{{ route('orders.invoice',$order->id)  }}" class="btn btn-primary btn-hover-black">Invoice</a>


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
    <!-- #END# Basic Examples -->
    </div></div>
</section>

@endsection
