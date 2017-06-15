  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
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
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        @if (!empty($halaman) && $halaman == 'dashboard')
        <li class="active">
          <a href="{{ url('/admin') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        @else
        <li>
          <a href="{{ url('/admin') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        @endif

        <li class="active treeview"><a href="#"><i class="fa fa-files-o"></i><span>Data</span></a>
          <ul class="treeview-menu">
          @if (!empty($halaman) && $halaman == 'objekwisata')
            <li class="active"><a href="{{ route('objekwisata.index') }}"><i class="fa fa-map-marker"></i>Objek Wisata</a></li>
          @else
            <li><a href="{{ route('objekwisata.index') }}"><i class="fa fa-map-marker"></i>Objek Wisata</a></li>
          @endif
          @if (!empty($halaman) && $halaman == 'users')
            <li class="active"><a href="{{ url('/admin/data/users') }}"><i class="fa fa-user"></i>Users</a></li>
          @else
            <li><a href="{{ url('/admin/data/users') }}"><i class="fa fa-user"></i>Users</a></li>
          @endif
          </ul>
        </li>

        @if (!empty($halaman) && $halaman == 'transaksi')
        <li class="active">
          <a href="{{ url('/admin/transaksi') }}">
            <i class="fa fa-files-o"></i> <span>Transaksi</span>
          </a>
        </li>
        @else
        <li><a href="{{ url('/admin/transaksi') }}"><i class="fa fa-files-o"></i> <span>Transaksi</span></a></li>
        @endif
        
    </section>
    <!-- /.sidebar -->
  </aside>