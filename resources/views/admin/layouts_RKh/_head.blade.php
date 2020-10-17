<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=Edge">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   
   <title> {{ sitesetting()->site_name  }} | @yield('site_name')</title>
   <!-- Favicon-->
   <!-- <link rel="icon" href="favicon.ico" type="image/x-icon"> -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('/frontend') }}/images/resources/solex.ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('/frontend') }}/images/resources/solex.ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('/frontend') }}/images/resources/solex.ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/frontend') }}/images/resources/solex.ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('/frontend') }}/images/resources/solex.ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('/frontend') }}/images/resources/solex.ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('/frontend') }}/images/resources/solex.ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('/frontend') }}/images/resources/solex.ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/frontend') }}/images/resources/solex.ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ url('/frontend') }}/images/resources/solex.ico//android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/frontend') }}/images/resources/solex.ico//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('/frontend') }}/images/resources/solex.ico//favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/frontend') }}/images/resources/solex.ico//favicon-16x16.png">
   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/ico" href=" url('Frontend')  }}/favicon.ico" />

   <!-- Bootstrap Core Css -->
   <link href="{{url('/backend')}}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

   <!-- Waves Effect Css -->
   <link href="{{url('/backend')}}/plugins/node-waves/waves.css" rel="stylesheet" />

   <!-- Animation Css -->
   <link href="{{url('/backend')}}/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{url('/backend')}}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
   <!-- Morris Chart Css-->
   <link href="{{url('/backend')}}/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="{{url('/backend')}}/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <link href="{{url('/backend')}}/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{url('/backend')}}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

   <!-- Custom Css -->
   <link href="{{url('/backend')}}/css/style.css" rel="stylesheet">

   <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
   <link href="{{url('/backend')}}/css/themes/all-themes.css" rel="stylesheet" />
   @toastr_css

 <style>
     .font_l{text-transform: uppercase;}
     .font_l:hover{text-decoration: none;}
 </style>
</head>
<body class="theme-black">
