

<footer class="footer-area">
    <div class="footer-top-area bg-img pt-105 pb-65" style="background-image: url({{url('user')}}/img/bg/1.jpg)" data-overlay="9">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 ">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-widget-title">Police</h3>
                        <div class="footer-widget-content">
                            <ul>
                                 @foreach ($cmspage_all as $key => $value)
                                   <li><a href="{{route('cms.link',$value->link)}}"><small> {{$value->title}}</small></a></li>
                              @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 ">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-widget-title">Categories</h3>
                        <div class="footer-widget-content">
                            <ul>
                                <li><a href="shop.html">Dress</a></li>
                                <li><a href="shop.html">Shoes</a></li>
                                <li><a href="shop.html">Shirt</a></li>
                                <li><a href="shop.html">Baby Product</a></li>
                                <li><a href="shop.html">Mans Product</a></li>
                                <li><a href="shop.html">Leather</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 ">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-widget-title">Categories</h3>
                        <div class="footer-widget-content">
                            <ul>
                                <li><a href="shop.html">Dress</a></li>
                                <li><a href="shop.html">Shoes</a></li>
                                <li><a href="shop.html">Shirt</a></li>
                                <li><a href="shop.html">Baby Product</a></li>
                                <li><a href="shop.html">Mans Product</a></li>
                                <li><a href="shop.html">Leather</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 ">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-widget-title">Contact</h3>
                        <div class="footer-newsletter">
                          <p>{{$settings->description}}.</p>
                            <div id="mc_embed_signup" class="subscribe-form pr-10">
                                <form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate"  novalidate>
                                      @csrf
{{--                                    action="{{route('add.subscribe')}}"--}}
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                      <h5 style="color:#fff">Subscribe To See News.</h5>
                                        <input type="email"   name="email" class="email" id="email_subscribe" placeholder="E-mail" required>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div class="mc-news" aria-hidden="true">
                                            <input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value="">
                                        </div>
                                        <div class="clear">
                                            <button type="submit"  name="subscribe" id="mc-embedded-subscribe" class="button subscribe">ADD</button>
                                            <!-- <input type="submit" style="color:#fff"  value="Subscribe"> -->
                                        </div>
                                        <p id="text_subscribe"></p>
                                    </div>
                                </form>
                            </div>
                            <div class="footer-contact">
                                <p><span><i class="ti-location-pin"></i></span> {{$settings->head_office}}. </p>
                                <?php if (! empty($settings->phone1)): ?>
                                <p><span><i class=" ti-headphone-alt "></i></span> <a href="tel:{{$settings->phone1}}"> {{$settings->phone1}}</a></p>
                              <?php endif; ?>
                                <?php if (! empty($settings->phone2)): ?>
                                <p><span><i class=" ti-headphone-alt "></i></span> <a href="tel:{{$settings->phone2}}"> {{$settings->phone2}}</a></p>
                              <?php endif; ?>
                                <?php if (! empty($settings->phone3)): ?>
                                  <p><span><i class=" ti-headphone-alt "></i></span> <a href="tel:{{$settings->phone3}}"> {{$settings->phone3}}</a></p>
                              <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom black-bg ptb-20">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="copyright">
                        <p>
                            Copyright ©
                            <a href="https://hastech.company/">HasTech</a> 2018 . All Right Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{url('user')}}/js/vendor/jquery-1.12.0.min.js"></script>
<script src="{{url('user')}}/js/popper.js"></script>
<script src="{{url('user')}}/js/bootstrap.min.js"></script>
<script src="{{url('user')}}/js/jquery.magnific-popup.min.js"></script>
<script src="{{url('user')}}/js/isotope.pkgd.min.js"></script>
<script src="{{url('user')}}/js/imagesloaded.pkgd.min.js"></script>
<script src="{{url('user')}}/js/jquery.counterup.min.js"></script>
<script src="{{url('user')}}/js/waypoints.min.js"></script>
<script src="{{url('user')}}/js/ajax-mail.js"></script>
<script src="{{url('user')}}/js/owl.carousel.min.js"></script>
<script src="{{url('user')}}/js/plugins.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.9.0/jquery.validate.min.js"></script>
<script src="{{url('user')}}/js/main.js"></script>
<script src="{{url('user')}}/script.js"></script>


@toastr_js
@toastr_render

<script>
    $(document).ready(function () {
        $("#navigation").change(function()
        {
            document.location.href = $(this).val();
        });
    });
</script>
 <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e7632537f95af3d"></script>
@yield('js_content')

</body>
</html>
