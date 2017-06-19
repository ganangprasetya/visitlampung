@extends('layouts.user.users')
@section('navbar')
    @include('layouts.user.navbar')
@endsection
@section('content')
    <div class="row tengah grey lighten-4">
        <div class="col s12 m8 offset-m2">
            <div class="card-panel grey lighten-5 z-depth-2">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class=" input-field col s12">
                            <input id="email" type="text"  class="validate"  name="email" value="{{ old('email') }}" required autofocus>
                            <label for="email">E-Mail Address</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" required>
                            <label for="password">Password</label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> 
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : ''}}> 
                        <label for="remember">Remember Me</label>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="input-field col s12">
                            <p>Belum Punya Akun? <a class="waves-effect waves-teal btn-flat" href="{{ url('/register') }}"> Register</a></p>
                        </div>
                        <div class="row">
                            <div class="col s12">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="waves-effect waves-teal btn-flat"href="{{ url('/password/reset') }}">
                                Forgot Your Password?
                            </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts/user/footer')
@endsection