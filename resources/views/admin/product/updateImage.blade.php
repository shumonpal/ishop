  @extends('admin.layout')

  @section('title', 'Update Products')

  @section('css')

  <!-- bootstrap-fileinput plugin. -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/fileinput/css/fileinput.min.css')}}">

  @endsection

  @section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Products Images
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Product Images</li>
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
              @include('admin.product.forms.formUpdateImage')

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
  
    <!-- bootstrap-fileinput plugin. -->
    <script src="{{asset('public/admin/vandor/fileinput/js/fileinput.min.js')}}"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    $("#image").fileinput({
        showUpload: true,
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
  });

  </script>
   
  @endsection