<!DOCTYPE html>
<html>
<head>
<style type="text/css">
  #map-canvas{
    width: 900px;
    height: 300px;
  }
  #map1{
    width: 1100px;
    height: 300px;
  }
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css'>
  <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
  <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}" rel='stylesheet' type='text/css'>
  <link href="{{ asset('dist/css/AdminLTE.min.css') }}" rel='stylesheet' type='text/css'>
  <link href="{{ asset('dist/css/skins/_all-skins.min.css') }}" rel='stylesheet' type='text/css'>
  <link href="{{ asset('plugins/iCheck/flat/blue.css') }}" rel='stylesheet' type='text/css'>
  <link href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel='stylesheet' type='text/css'>
  <link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel='stylesheet' type='text/css'>
  <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel='stylesheet' type='text/css'>
  <link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel='stylesheet' type='text/css'>
  <link href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel='stylesheet' type='text/css'>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.admin.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('content')
    
  </div>
  @include('layouts.admin.footer')
</div>

<!-- Script -->

<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') }}"></script>
<script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="{{ asset('plugins/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('plugins/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('plugins/flot/jquery.flot.pie.min.js') }}"></script>
<script src="{{ asset('plugins/flot/jquery.flot.categories.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@yield('scripts')

{{-- <script>
  $(function () {
    $("#objekwisata").DataTable();
    $('#objekwisata').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script> --}}
</body>
</html>
