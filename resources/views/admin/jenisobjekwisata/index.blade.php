@extends('layouts.admin.admin')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jenis Objek Wisata
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="{{ url('/admin/data/objekwisata') }}"><i></i> Objek Wisata</a></li>
        <li class="active">Jenis Objek Wisata</li>
      </ol>
    </section>
    <div class="row">
      {{-- <div  id="jenisobjekwisata"> --}}
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Jenis Objek Wisata</h3>
            </div>
            <div class="box-body">
            @include('admin._partial.flash_message')
              <table id="jenisobjekwisata" class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Jenis Objek Wisata</th>
                  @role('admin')
                  <th>Action</th>
                  @endrole
                </thead>
                <tbody>
                  <?php  $no = 1; ?>
                  @foreach($jenisobjekwisata as $objek)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $objek->jenis_objekwisata}}</td>
                      @role('admin')
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat">Action</button>
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ route('jenisobjekwisata.edit',$objek->id) }}">Update</a></li>
                          <li>
                              {!! Form::open(['method' => 'DELETE', 'action' => ['JenisobjekwisataController@destroy', $objek->id]]) !!}
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
              <div class="bottom-nav">
                  <div>
                    @role('admin')
                    <a href="{{ route('jenisobjekwisata.create') }}" class="btn btn-primary">Tambah Data</a>
                    @endrole
                  </div>
              </div> 
            </div>
          </div> 
        </div>
      {{-- </div>  --}}
    </div>

@endsection

@section('scripts')
  <script>
  $(function () {
    $('#jenisobjekwisata').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection