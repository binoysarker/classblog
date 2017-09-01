@extends('layouts.adminlayout')

@section('userlogin')
    <h1>Welcome Back!</h1>

    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="field-wrap{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail Address<span class="req">*</span></label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="field-wrap{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class=" control-label">Password<span class="req">*</span></label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="field-wrap">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>
        </div>

        <div class="field-wrap">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="button button-block">
                    Login
                </button>

                <a class="forgot" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
        </div>
    </form>
@endsection
