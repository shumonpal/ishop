<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name')}} | @yield('title', 'Dashboard')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/bootstrap/css/bootstrap.css')}}">

  <!-- toastr -->
  <link rel="stylesheet" href="{{asset('public/vandor/toastr/toastr.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/Ionicons/css/ionicons.min.css')}}">

  @yield('css')

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin/dist/css/AdminLTE.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/admin/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">

  <link rel="stylesheet" href="{{asset('public/admin/dist/css/custom.css')}}">

  

 

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <script type="text/javascript">
    window.Laravel = <?php echo json_encode([
      'csrfToken' => csrf_token(),
      ]); ?>
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


  @include('admin.partials.header')
  
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.partials.sidebar')




  <!-- Content Wrapper. Contains page content -->
    @yield('content')
  <!-- /.content-wrapper -->


  @include('admin.partials.footer')

 

  <!-- Control Sidebar -->
  @include('admin.partials.sidebarRight')  
  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('public/admin/vandor/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/admin/vandor/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('public/admin/vandor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<!-- <script src="{{asset('public/admin/vandor/raphael/raphael.min.js')}}"></script> -->
<!-- <script src="{{asset('public/admin/vandor/morris.js/morris.min.js')}}"></script> -->
<!-- Sparkline -->
<!-- <script src="{{asset('public/admin/vandor/jquery-sparkline/jquery.sparkline.min.js')}}"></script> -->
<!-- jvectormap -->
<!-- <script src="{{asset('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script> -->
<!-- <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="{{asset('public/admin/vandor/jquery-knob/jquery.knob.min.js')}}"></script>
 --><!-- daterangepicker -->
<!-- <script src="{{asset('public/admin/vandor/moment/moment.min.js')}}"></script> -->
<!-- <script src="{{asset('public/admin/vandor/bootstrap-daterangepicker/daterangepicker.js')}}"></script> -->
<!-- datepicker -->
<!-- <script src="{{asset('public/admin/vandor/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script> -->
<!-- Slimscroll -->
<script src="{{asset('public/admin/vandor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/admin/vandor/fastclick/fastclick.js')}}"></script>

<!-- toastr -->
<script src="{{asset('public/vandor/toastr/toastr.min.js')}}"></script>

 @yield('script')

 
<!-- AdminLTE App -->
<script src="{{asset('public/admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/admin/dist/js/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/admin/dist/js/demo.js')}}"></script>
<!-- My custom script -->
<script src="{{asset('public/admin/dist/js/custom.js')}}"></script>




</body>
</html>
