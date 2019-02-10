  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li class="{{ Request::segment(2) == 'admin' && Request::segment(3) == '' ? 'active' : '' }}">
          <a href="{{url('admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <!-- Product menu -->
        <li class="treeview {{ Request::segment(3) == 'products' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::segment(3) == 'products' && Request::segment(4) == '' ? 'active' : '' }}">
              <a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i>Products List</a>
            </li>
            <li class="{{ Request::segment(3) == 'products' && Request::segment(4) == 'create' ? 'active' : '' }}">
              <a href="{{ route('products.create') }}"><i class="fa fa-circle-o"></i>Products Create</a>
            </li>
          </ul>
        </li>
        <!-- /Product menu -->

        <!-- Category menu -->
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="">
              <a href="{{ route('pro-version', ['page' => 'category-lists']) }}"><i class="fa fa-circle-o"></i>Category Lists</a>
            </li>
            <li class="">
              <a href="{{ route('pro-version', ['page' => 'category-create']) }}"><i class="fa fa-circle-o"></i>Category Create</a>
            </li>
          </ul>
        </li>
        <!-- /Category menu -->

        <!-- Sub Category menu -->
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Sub Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="">
              <a href="{{ route('pro-version', ['page' => 'sub-category-lists']) }}"><i class="fa fa-circle-o"></i>Sub Category Lists</a>
            </li>
            <li class="">
              <a href="{{ route('pro-version', ['page' => 'sub-category-create']) }}"><i class="fa fa-circle-o"></i>Sub Category Create</a>
            </li>
          </ul>
        </li>
        <!-- /Sub Category menu -->

        <!-- Brand menu -->
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-empire"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="">
              <a href="{{ route('pro-version', ['page' => 'sub-category-lists']) }}"><i class="fa fa-circle-o"></i>Brand Lists</a>
            </li>
            <li class="">
              <a href="{{ route('pro-version', ['page' => 'sub-category-create']) }}"><i class="fa fa-circle-o"></i>Brand Create</a>
            </li>
          </ul>
        </li>
        <!-- /Brand menu -->

        <!-- Mentainance menu -->
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-cog"></i>
            <span>Mentainance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="">
              <a href="{{ route('pro-version', ['page' => 'sub-category-lists']) }}"><i class="fa fa-circle-o"></i>Mentainance Products Reviews</a>
            </li>
            <li class="">
              <a href="{{ route('pro-version', ['page' => 'sub-category-create']) }}"><i class="fa fa-circle-o"></i>Mentainance Orders</a>
            </li>
          </ul>
        </li>
        <!-- /Mentainance menu -->
\

        <!-- Inventory menu -->
        <li>
          <a href="{{ route('pro-version', ['page' => 'inventory']) }}">
            <i class="fa fa-calculator"></i>
            <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <!-- /Inventory menu -->

        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>