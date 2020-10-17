<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('site_name')</title>
    <!-- Favicon-->
    <link rel="icon" href="{{url('/backend')}}/favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="{{url('/backend')}}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="{{url('/backend')}}/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{url('/backend')}}/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{url('/backend')}}/css/style.css" rel="stylesheet">
    <style>
      .login-page{
          background-color: #E91E63;
    }

    </style>
</head>
<body class="login-page">
     <!-- Page Loader -->
     <div class="page-loader-wrapper">
         <div class="loader">
             <div class="preloader">
                 <div class="spinner-layer pl-red">
                     <div class="circle-clipper left">
                         <div class="circle"></div>
                     </div>
                     <div class="circle-clipper right">
                         <div class="circle"></div>
                     </div>
                 </div>
             </div>
             <p>Please wait...</p>
         </div>
     </div>
     <!-- #END# Page Loader -->

    @yield('content')
       @include('partials._errors')
       @include('sweetalert::alert')

 <!-- Jquery Core Js -->
   <script src="{{url('/backend')}}/plugins/jquery/jquery.min.js"></script>

   <!-- Bootstrap Core Js -->
   <script src="{{url('/backend')}}/plugins/bootstrap/js/bootstrap.js"></script>

   <!-- Select Plugin Js -->
   <script src="{{url('/backend')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

   <!-- Slimscroll Plugin Js -->
   <script src="{{url('/backend')}}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

   <!-- Waves Effect Plugin Js -->
   <script src="{{url('/backend')}}/plugins/node-waves/waves.js"></script>

   <!-- Jquery CountTo Plugin Js -->
   <script src="{{url('/backend')}}/plugins/jquery-countto/jquery.countTo.js"></script>

   <!-- Morris Plugin Js -->
   <script src="{{url('/backend')}}/plugins/raphael/raphael.min.js"></script>
   <script src="{{url('/backend')}}/plugins/morrisjs/morris.js"></script>

   <!-- ChartJs -->
   <script src="{{url('/backend')}}/plugins/chartjs/Chart.bundle.js"></script>

   <!-- Flot Charts Plugin Js -->
   <script src="{{url('/backend')}}/plugins/flot-charts/jquery.flot.js"></script>
   <script src="{{url('/backend')}}/plugins/flot-charts/jquery.flot.resize.js"></script>
   <script src="{{url('/backend')}}/plugins/flot-charts/jquery.flot.pie.js"></script>
   <script src="{{url('/backend')}}/plugins/flot-charts/jquery.flot.categories.js"></script>
   <script src="{{url('/backend')}}/plugins/flot-charts/jquery.flot.time.js"></script>

   <!-- Sparkline Chart Plugin Js -->
   <script src="{{url('/backend')}}/plugins/jquery-sparkline/jquery.sparkline.js"></script>

   <!-- Custom Js -->
   <script src="{{url('/backend')}}/js/admin.js"></script>
   <script src="{{url('/backend')}}/js/pages/index.js"></script>

   {{--<!-- Jquery DataTable Plugin Js -->--}}
   {{--<script src="{{url('/backend')}}/plugins/jquery-datatable/jquery.dataTables.js"></script>--}}
   {{--<script src="{{url('/backend')}}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>--}}
   {{--<script src="{{url('/backend')}}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>--}}
   {{--<script src="{{url('/backend')}}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>--}}
   {{--<script src="{{url('/backend')}}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>--}}
   {{--<script src="{{url('/backend')}}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>--}}
   {{--<script src="{{url('/backend')}}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>--}}
   {{--<script src="{{url('/backend')}}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>--}}
   {{--<script src="{{url('/backend')}}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>--}}

   <!-- Demo Js -->
   <script src="{{url('/backend')}}/js/demo.js"></script>
   <script src="{{url('/backend')}}/js/pages/tables/jquery-datatable.js"></script>

</body>

</html>
