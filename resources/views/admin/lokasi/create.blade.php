@extends('layouts.admin.admin')
@section('content')
    <section class="content-header">
      <h1>
        Lokasi
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="{{ url('/admin/data/objekwisata') }}"><i></i> Objek Wisata</a></li>
        <li class="active"><a href="{{ route('lokasi.index') }}"><i></i> Lokasi</a></li>
      </ol>
    </section>
		    <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Lokasi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{-- <form role="form"> --}}
          	{!! Form::open(['route'=>'lokasi.store']) !!}
              <div class="box-body">
        				@if ($errors->any())
                  <div class="form-group {{ $errors->has('id_kabupatenkota') ? 'has-error' : 'has-success' }}">
                @else
                  <div class="form-group">
                @endif
                  <label>Nama Kabupaten</label>
                  {!! Form::select('id_kabupatenkota', App\Kabupaten::pluck('nama_kabupatenkota','id')->all(), null, ['class'=>'form-control','id'=>'id_kabupatenkota','placeholder'=>'Pilih Kabupaten']) !!}
                @if ($errors->has('id_kabupatenkota'))
                      <span class="help-block">{{ $errors->first('id_kabupatenkota') }}</span>
                @endif
                </div>
                
        				@if ($errors->any())
                  <div class="form-group {{ $errors->has('id_kecamatan') ? 'has-error' : 'has-success' }} kecamatan">
                @else
                  <div class="form-group kecamatan">
                @endif
                  <label>Nama Kecamatan</label>
                  <select class="form-control" name="id_kecamatan" id="id_kecamatan">
                    <option value=""></option>
                  </select>
                  {{-- {!! Form::select('id_kecamatan', App\Kecamatan::pluck('nama_kecamatan','id')->all(), null, ['class'=>'form-control','id'=>'id_kecamatan','placeholder'=>'Pilih Kecamatan']) !!} --}}
                @if ($errors->has('id_kecamatan'))
                      <span class="help-block">{{ $errors->first('id_kecamatan') }}</span>
                @endif
                </div>
        				
                @if ($errors->any())
                  <div class="form-group {{ $errors->has('desa_kelurahan') ? 'has-error' : 'has-success' }}">
                @else
                  <div class="form-group">
                @endif
        					{!! Form::label('desa_kelurahan', 'Nama Desa/Kelurahan:', ['class' => 'control-label']) !!}
        					{!! Form::text('desa_kelurahan', null, ['class' => 'form-control']) !!}
                @if ($errors->has('desa_kelurahan'))
                      <span class="help-block">{{ $errors->first('desa_kelurahan') }}</span>
                @endif
        				</div>
              </div>
                      <!-- /.box-body -->
              <div class="box-footer">
                  <div class="form-group">
        					 {!! Form::submit('Tambah', ['class' => 'btn btn-primary form-control']) !!}
        			   </div>
              </div>
                    {{-- </form> --}}
                    {!! Form::close() !!}
            </div>
          </div>
        {{-- <script type="text/javascript">alert('test');</script> --}}
        <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            $('.kecamatan').hide();
            $('#id_kabupatenkota').on('change', function(e){
              $('.kecamatan').show();
              console.log(e);

              var kabupaten_id = e.target.value;

              console.log(kabupaten_id);

              //ajax
    
              $.ajax({
                url : 'lokasi-ajax?id_kabupatenkota=' + kabupaten_id,
                type : "GET",
                dataType : "JSON",
                success : function(data){
                  // alert('bisa!!!');
                  $('#id_kecamatan').empty();
                  // alert(data);
                  $.each(data, function(index, kecamatan){
                    // alert(kecamatan.id+" "+ kecamatan.nama_kecamatan);
                    $('#id_kecamatan').append('<option value="'+kecamatan.id+'">'+kecamatan.nama_kecamatan+'</option>');
                    // alert(kecamatan);
                  });
                },
                error : function(){
                  alert('Belum bisa!!!');
                }
              });
            });
          });
        </script>
@endsection

