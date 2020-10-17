@section('site_name',$cms->meta_title)
@section('meta_desc',$cms->meta_description)
@extends('user.layout.__app')
@section('content')
<div class="breadcrumb-area pt-205 pb-210" style="background-image: url({{ url('backend/about_images/'.$cms->image)}});background-size:cover">
            <div class="container">

                <div class="breadcrumb-content text-center">
                    <h2>{{$cms->title}}</h2>
                    <ul>
                        <li><a href="{{url('/')}}">home</a></li>
                        <li>{{$cms->title}}  </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="about-story pt-80 pb-80">
                  <div class="container">
                      <div class="row">

                          <div class="col-lg-12">
                              <div class="story-details pl-50">
                                  <div class="story-details-top">
                                      <h2><span>{{$cms->title}}</span></h2>
                                  <h5>{{$cms->description}}</h5>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
@endsection
