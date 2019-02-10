  @extends('admin.layout')

  @section('title', 'Products Lists')

  @section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/admin/vandor/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  @endsection

  @section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products Lists
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Products Lists</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Products Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            {{ session('success') ? messege('success', session('success')) : '' }}

              <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>In Stock</th>
                  <th>Ceatetion Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                <tr class="delete-parent">
                  <td>{{ $product->pdt_name }}</td>
                  <td><img src="{{ productsImageUrl($product->id) }}" alt=" " class="img-responsive" width="70" /></td>
                  <td>${{ $product->price }} <br><i class="item_price">Up ${{ $product->up_price }}</i></td>
                  <td>{{ title_case($product->categories->name) }}</td>
                  <td>{{ title_case(App\Frontend\ProductsBrand::where('id', $product->brand_id)->first()->name) }}</td>
                  <td>{{ $product->in_stock }}</td>
                  <td>{{ $product->created_at->format('d M y') }}</td>
                  <td width="100">
                    <div class="btn-group">
                      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                      <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm show-modal"><i class="fa fa-file-text-o"></i></a>
                      <a href="{{ route('products.destroy', $product->id) }}" data-token="{{ csrf_token() }}" class="btn btn-danger btn-sm delete-item"><i class="fa  fa-trash-o"></i></a>
                    </div>
                  </td>
                </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot>
              </table>
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
  <!-- DataTables -->
  <script src="{{asset('public/admin/vandor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('public/admin/vandor/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script>
  $(function () {
    $('#dataTable').DataTable()
  })
</script>
  @endsection