@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
<<<<<<< HEAD
                <div class="panel-heading">Login</div>
=======
                <div class="panel-heading">Вхід</div>
>>>>>>> v1.0

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

<<<<<<< HEAD
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
=======
                        <div class="form-group{{ $errors->has('personal_id') ? ' has-error' : '' }}">
                            <label for="personal_id" class="col-md-4 control-label">Табельний №</label>

                            <div class="col-md-6">
                                <input id="personal_id" type="text" class="form-control" name="personal_id" value="{{ old('personal_id') }}" required autofocus placeholder="S12345">

                                @if ($errors->has('personal_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('personal_id') }}</strong>
>>>>>>> v1.0
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<<<<<<< HEAD
                            <label for="password" class="col-md-4 control-label">Password</label>
=======
                            <label for="password" class="col-md-4 control-label">Пароль</label>
>>>>>>> v1.0

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
<<<<<<< HEAD
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
=======
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запам'ятати мене
>>>>>>> v1.0
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
<<<<<<< HEAD
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
=======
                                    Вхід
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Забули пароль?
>>>>>>> v1.0
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> v1.0
