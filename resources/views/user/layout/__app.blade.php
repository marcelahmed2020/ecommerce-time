@include('user.layout.__head')

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- header start -->
@include('user.layout.__header')
<!-- header end -->
<div class="shop-page-wrapper shop-page-padding ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
              @include('user.layout.__aside')
            </div>
            <div class="col-lg-9">
                 @yield('content')
                @include('partials._errors')
            </div>
        </div>
    </div>
</div>
@include('user.layout.__footer')
