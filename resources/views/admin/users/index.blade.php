@extends('layouts.admin.admin')
@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Users</li>
      </ol>
    </section>
    <div class="row">
      {{-- <div  id="kecamatan"> --}}
        <div class="col-sm-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Users</h3>
            </div>
            <div class="box-body">
              @include('admin._partial.flash_message')
              <table id="users" class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Last Login</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php  $no = 1; ?>
                  @foreach($users as $objek)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $objek->name }}</td>
                      <td>{{ $objek->email }}</td>
                      <td></td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-flat">Action</button>
                          <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            {{-- <li><a href="#">Delete</a></li> --}}
                            <li><a href="{{ route('users.edit',$objek->id) }}">Update</a></li>  
                            <li><a href="{{ route('users.show', $objek->id) }}">Detail</a></li>                  
                            <li>
                                {!! Form::open(['method' => 'DELETE', 'action' => ['UsersController@destroy', $objek->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-link']) !!}
                                {!! Form::close() !!}
                            </li>                        
                          </ul>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              @role('admin')
                {{-- <div class="bottom-nav">
                  <div>
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Data</a>
                  </div>
                </div>  --}}
              @endrole
            </div>
          </div>
        </div>
      {{-- </div> --}}
    </div>

@endsection
@section('scripts')
  <script>
  $(function () {
    $('#users').DataTable({
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