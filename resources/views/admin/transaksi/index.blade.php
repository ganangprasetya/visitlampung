@extends('layouts.admin.admin')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Transaksi
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Transaksi</li>
      </ol>
    </section>
    <div class="row">
      {{-- <div  id="transaksi"> --}}
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Transaksi Kunjungan Wisata</h3>
            </div>
            <div class="box-body">
              <table id="transaksi" class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Objek Wisata</th>
                  <th>Nama User</th>
                  @role('admin')
                    <th>Action</th>
                  @endrole
                </thead>
                <tbody>
                  <?php  $no = 1; ?>
                  @foreach($transaksi as $objek)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $objek->created_at }}</td>
                      <td>{{ $objek->objekwisata->nama_objekwisata }}</td>
                      <td>{{ $objek->user->name }}</td>
                      @role('admin')
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat">Action</button>
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                          {{-- <li><a href="#">Delete</a></li> --}}                 
                          <li>
                              {!! Form::open(['method' => 'DELETE', 'action' => ['KecamatanController@destroy', $objek->id]]) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!}
                              {!! Form::close() !!}
                          </li>                        
                          </ul>
                        </div>
                      </td>
                      @endrole
                    </tr>
                  @endforeach
                </tbody>
              </table>
              @role('admin')
              <br>
                <div class="bottom-nav">
                    <div>
                      <a href="#" class="btn btn-primary">Cetak Transaksi</a>
                    </div>
                </div> 
              @endrole
            </div>
          </div> 
        </div>
      {{-- </div>  --}}
    </div>
@endsection
@section('scripts')
  <script>
  $(function () {
    $('#transaksi').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection