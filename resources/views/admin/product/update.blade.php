  @extends('admin.layout')

  @section('title', 'Update Products')

  @section('css')
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/select2/css/select2.min.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <!-- bootstrap-fileinput plugin. -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/fileinput/css/fileinput.min.css')}}">

    <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
  @endsection

  @section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Products Form
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Products</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
               <!-- form start -->
              @include('admin.product.forms.formUpdate')

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
      </div>

    </section>
    <!-- /.content -->
  </div>

  <!-- Modal default -->
  @include('admin.modal.default')
  <!-- /.modal -->
  @endsection

  @section('script')
  
    <!-- Select2 -->
    <script src="{{asset('public/admin/vandor/select2/js/select2.full.min.js')}}"></script>

    <!-- bootstrap color picker -->
    <script src="{{asset('public/admin/vandor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

    <script src="{{asset('public/admin/vandor/iCheck/icheck.min.js')}}"></script>

    <!-- CK Editor -->
    <!-- <script src="{{asset('public/admin/vandor/ckeditor/ckeditor.js')}}"></script> -->
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('public/admin/vandor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

    <!-- bootstrap-fileinput plugin. -->
    <script src="{{asset('public/admin/vandor/fileinput/js/fileinput.min.js')}}"></script>

    <!-- bootstrap color picker -->
    <script src="{{asset('public/admin/vandor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

    <script type="text/javascript">
      
      $(function () {
          //Initialize Select2 Elements
          $('.select2').select2();

          //bootstrap WYSIHTML5 - text editor
          $('.bootstrap-editor').wysihtml5();

          //Flat red color scheme for iCheck
          $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
          });

          //bootstrap-fileinput plugin
          $("#banner_image").fileinput({
              showUpload: false,
              allowedFileExtensions: ["jpg", "png", "gif"]
          });

          //Colorpicker
          $('.colorpicker1').colorpicker();

      });
    </script>
  @endsection