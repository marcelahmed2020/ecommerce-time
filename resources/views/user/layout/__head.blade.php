<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="@yield('meta_desc')">
    <meta name="keywords" content="{{$settings->keywords}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{$settings->site_name}}  | @yield('site_name')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{url('/user')}}/img/favicon.png">
    <!-- all css here -->
    <link rel="stylesheet" href="{{url('user')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('user')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('user')}}/css/animate.css">
    <link rel="stylesheet" href="{{url('user')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('user')}}/css/themify-icons.css">
    <link rel="stylesheet" href="{{url('user')}}/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="{{url('user')}}/css/icofont.css">
    <link rel="stylesheet" href="{{url('user')}}/css/meanmenu.min.css">
    <link rel="stylesheet" href="{{url('user')}}/css/bundle.css">
    <link rel="stylesheet" href="{{url('user')}}/css/style.css">
    <link rel="stylesheet" href="{{url('user')}}/css/responsive.css">
    <script src="{{url('user')}}/js/vendor/modernizr-2.8.3.min.js"></script>
    @yield('content_css')
    @toastr_css
    <style>
        .edit_inc{
            background: #eceff8;border: 2px solid #eceff8;    height: 22px;box-shadow: none;    padding-left: 10px;font-size: 14px;color: #626262;width: 4%;
        }
        .edit_la{
            position: absolute;
            margin: 0 4px;
        }
        .edit_gr{
            display: inline;
            margin-right: 50px;
        }
    </style>



</head>
<body>
