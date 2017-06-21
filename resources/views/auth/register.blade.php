@extends('layouts.user.users')
@section('navbar')
    @include('layouts.user.navbar')
@endsection
@section('content')
    <div class="row tengah grey lighten-3">
        <div class="col s12 m8 offset-m2">
            <div class="card-panel grey lighten-4 z-depth-2">
                <h2 class="grey-text">REGISTRASI</h2>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                <label for="name">Nama</label>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <label for="email">E-Mail</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <label for="password">Password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-field col s12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <label for="password-confirm">Confirm Password</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <button style="width:100%" type="submit" class="btn btn-large">
                                    Registrasi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts/user/footer')
@endsection
