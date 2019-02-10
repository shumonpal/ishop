  @extends('admin.layout')

  @section('title', 'Pro Version')


  @section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Products Form
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pro Version Page</li>
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
            	
              <div class="alert alert-info " style="margin-bottom: 0;height: 300px;background-color: #9fecff !important;text-align: center;">
            	<h1 style="margin-top: 75px;">Sorry!</h1>
            	<p class="text-muted">This <b>{{$exception->getMessage()}}</b> feature is only for pro-version. Buy Now and get 6 months mantainance free</p>
            	<a class="btn btn-info" href="{{url('/')}}" style="margin-top: 45px;">Buy Now</a> 
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
      </div>

    </section>
    <!-- /.content -->
  </div>

  @endsection

