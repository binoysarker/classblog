@extends('layouts.adminlayout')

@section('userregister')
    <h1>Sign Up for Free</h1>

    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}

        <div class="field-wrap{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class=" control-label">Name<span class="req">*</span></label>

            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
            @endif
        </div>

        <div class="field-wrap{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="control-label">E-Mail Address<span class="req">*</span></label>

            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>

        <div class="field-wrap{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password" class=" control-label">Password<span class="req">*</span></label>

            <input id="password" type="password" class="form-control" name="password" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

            @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif
        </div>

        <div class="field-wrap">
            <label for="password-confirm" class=" control-label">Confirm Password<span class="req">*</span></label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="field-wrap">
            <div class="checkbox icheck">
                <label>
                    <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
            </div>
        </div>

        <div class="field-wrap">
            <button type="submit" class="button button-block">
                Register
            </button>
        </div>
    </form>
@endsection
