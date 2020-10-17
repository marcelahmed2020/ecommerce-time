@section('site_name','Contact Us')
@extends('user.layout.__app')
@section('content')
<div class="breadcrumb-area pt-205 pb-210" style="background-image: url({{url('user/img/contact.jpeg')}});">
            <div class="container">
                <div class="breadcrumb-content text-center" style="background-color:rgba(200, 0, 0, 0.8);padding:25px;">
                    <h2>contact us</h2>
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li> contact us</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="contact-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-map-wrapper">

                            <div class="contact-message">
                                <div class="contact-title">
                                    <h4>Contact Information</h4>
                                </div>
                                <form action="{{route('contact')}}" method="post">
                                  @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="contact-input-style mb-30">
                                                <label>Name*</label>
                                                <input name="name" placeholder="Type Your name" value="{{old('name')}}" required="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-input-style mb-30">
                                                <label>Email*</label>
                                                <input name="email" placeholder="Type Your email" value="{{old('email')}}" required="" type="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-input-style mb-30">
                                                <label>Telephone</label>
                                                <input name="telephone" placeholder="Type Your telephone" value="{{old('telephone')}}" required="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-input-style mb-30">
                                                <label>subject</label>
                                                <input name="subject" placeholder="Type Your subject" value="{{old('subject')}}" required="" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-textarea-style mb-30">
                                                <label>Comment*</label>
                                                <textarea class="form-control2" name="message" placeholder="Type Your message" required="">{{old('message')}}</textarea>
                                            </div>
                                            <button class="submit contact-btn btn-hover" type="submit">
                                                Send Message
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- <p class="form-messege"></p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-info-wrapper">
                            <div class="contact-title">
                                <h4>Location &amp; Details</h4>
                            </div>
                            <div class="contact-info">
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="ti-location-pin"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Address:</span>  {{$settings->head_office}}. <br></p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="pe-7s-mail"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><a href="mailto:{{$settings->email}}"><span>Email: </span> {{$settings->email}} </p>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-info-icon">
                                        <i class="pe-7s-call"></i>
                                    </div>
                                    <div class="contact-info-text">
                                        <p><span>Phone: </span>
                                          <?php if (! empty($settings->phone1)): ?>
                                          <p> <a href="tel:{{$settings->phone1}}"> {{$settings->phone1}}</a></p>
                                        <?php endif; ?>
                                          <?php if (! empty($settings->phone2)): ?>
                                          <p> <a href="tel:{{$settings->phone2}}"> {{$settings->phone2}}</a></p>
                                        <?php endif; ?>
                                          <?php if (! empty($settings->phone3)): ?>
                                            <p> <a href="tel:{{$settings->phone3}}"> {{$settings->phone3}}</a></p>
                                        <?php endif; ?>
                                         </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
