@section('site_name','Checkout')
@include('user.layout.head')
<div class="pl-200 pr-200 overflow clearfix">
    <div class="categori-menu-slider-wrapper clearfix">

        <div class="menu-slider-wrapper" style="    width: 97% !important;">
            <div class="menu-style-3 menu-hover text-center">
                <nav>
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>


                        <li><a href="contact.html">contact</a></li>
                        <li><a href="contact.html">contact</a></li>
                        <li><a href="contact.html">contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="container">
                <h5 class="ptb-10">Orders</h5>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-content table-responsive">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('user.layout.footer')
