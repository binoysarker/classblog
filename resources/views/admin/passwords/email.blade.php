@extends('layouts.adminlayout')
@section('title')
    {{-- expr --}}
    Admin Reset Password
@endsection

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Admi Email Reset Password</p>

    <form class="form-horizontal" method="POST" action="{{ route('admin.password.email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
            <label for="email" class=" control-label">Admin E-Mail Address</label>

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
        </div>

        <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    Send Password Reset Link
                </button>
        </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>


@endsection
