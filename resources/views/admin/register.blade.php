@extends('layouts.app')
@section('title')
    {{-- expr --}}
    Admin Register
@endsection

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form class="form-horizontal" method="POST" action="{{ route('admin.register') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class=" control-label">Name</label>

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail Address</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class=" control-label">Password</label>

                <input id="password" type="password" class="form-control" name="password" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group">
            <label for="password-confirm" class=" control-label">Confirm Password</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
            </div>
        </div>

        <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
        </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="login.html" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>



@endsection
