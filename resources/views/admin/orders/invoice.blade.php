<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$settings->site_name}}</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>Invoice</h2><h3 class="pull-right">Order # 12345</h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <h4><a href="{{route('users.show',$billing->id)}}"> Name : {{$billing->first_name }} {{$billing->last_name }}</a></h4>
                        <h4>Email : {{$billing->email }}</h4>
                        <h5> Country : {{$billing->usersinfos->country }}</h5>
                        <h6> City : {{$billing->usersinfos->city }}</h6>
                        <h6> State : {{$billing->usersinfos->state }}</h6>
                        <h6> Zip : {{$billing->usersinfos->zip }}</h6>
                        <h6> Street Address : {{$billing->usersinfos->address }}</h6>
                        <h6> Phone : {{$billing->usersinfos->phone1 }}</h6>
                        <h6> Other Phone : {{$billing->usersinfos->phone2 != 0 ?:' Not Have' }}</h6>

                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <h4>Name : {{$shipping->ship_first_name }} {{$shipping->ship_last_name }}</h4>
                        <h4>Email : {{$shipping->ship_email }}</h4>
                        <h5> Country : {{$shipping->ship_country }}</h5>
                        <h6> City : {{$shipping->ship_city }}</h6>
                        <h6> State : {{$shipping->ship_state }}</h6>
                        <h6> Zip : {{$shipping->ship_zip }}</h6>
                        <h6> Street Address : {{$shipping->ship_address }}</h6>
                        <h6> Phone : {{$shipping->ship_phone1 }}</h6>

                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>Payment Method:</strong><br>
                        {{$order->payment_method}}<br>
{{--                        jsmith@email.com--}}
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Order Date:</strong><br>
                        {{$order->created_at}}<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                            <tr>
                                <td><strong>Item</strong></td>
                                <td><strong>code</strong></td>
                                <td class="text-center"><strong>Price</strong></td>
                                <td class="text-center"><strong>Quantity</strong></td>
                                <td class="text-right"><strong>Totals</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            @php $price = 0; @endphp
                            @foreach($order->order_products as $key => $ord)
                                <tr>
                                <td>{{$ord->title}}</td>
                                    <td class="text-center">{{$ord->code}}</td>
                                    <td class="text-center">$ {{$ord->price}}</td>
                                <td class="text-center">{{$ord->quntity}}</td>
                                <td class="text-right">$ {{$ord->price*$ord->quntity}}</td>
                            </tr>
                                @php $price += $ord->price * $ord->quntity; @endphp
                            @endforeach
                            </tbody>
                            <tr>
{{--                                <td>Sub Total: $ {{ $price  }}</td>--}}
{{--                                <td>Shiping Charges: {{ $order->shiping_charges   }}</td>--}}
                                <td>Total: {{ $order->grand_total   }}</td>

                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
