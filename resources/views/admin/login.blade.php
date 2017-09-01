@extends('layouts.app')
@section('title')
    {{-- expr --}}
    Admin Login
@endsection

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('admin/home')}}"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form class="form-horizontal" method="POST" action="{{ route('admin.login') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
            <label for="email" class="control-label">E-Mail Address</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
            <label for="password" class="col-md-4 control-label">Password</label>

                <input id="password" type="password" class="form-control" name="password" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group has-feedback">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <input type="submit" name="submit" class="btn btn-primary btn-block btn-flat" value="Login">

                <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
        </div>
    </form>
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    
    <a href="#">I forgot my password</a><br>
    <a href="{{url('admin/register')}}" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>


@endsection
