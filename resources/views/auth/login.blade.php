@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
<<<<<<< .merge_file_a11960
<<<<<<< .merge_file_a09828
                <div class="panel-heading">Вхід</div>
=======
                <div class="panel-heading">Login</div>
>>>>>>> .merge_file_a01252
=======
                <div class="panel-heading">Login</div>
>>>>>>> .merge_file_a06864

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

<<<<<<< .merge_file_a11960
<<<<<<< .merge_file_a09828
                        <div class="form-group{{ $errors->has('personal_id') ? ' has-error' : '' }}">
                            <label for="personal_id" class="col-md-4 control-label">Табельний №</label>

                            <div class="col-md-6">
                                <input id="personal_id" type="text" class="form-control" name="personal_id" value="{{ old('personal_id') }}" required autofocus placeholder="S12345">

                                @if ($errors->has('personal_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('personal_id') }}</strong>
=======
=======
>>>>>>> .merge_file_a06864
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
<<<<<<< .merge_file_a11960
>>>>>>> .merge_file_a01252
=======
>>>>>>> .merge_file_a06864
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<<<<<<< .merge_file_a11960
<<<<<<< .merge_file_a09828
                            <label for="password" class="col-md-4 control-label">Пароль</label>
=======
                            <label for="password" class="col-md-4 control-label">Password</label>
>>>>>>> .merge_file_a01252
=======
                            <label for="password" class="col-md-4 control-label">Password</label>
>>>>>>> .merge_file_a06864

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
<<<<<<< .merge_file_a11960
<<<<<<< .merge_file_a09828
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запам'ятати мене
=======
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
>>>>>>> .merge_file_a01252
=======
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
>>>>>>> .merge_file_a06864
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
<<<<<<< .merge_file_a11960
<<<<<<< .merge_file_a09828
                                    Вхід
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Забули пароль?
=======
=======
>>>>>>> .merge_file_a06864
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
<<<<<<< .merge_file_a11960
>>>>>>> .merge_file_a01252
=======
>>>>>>> .merge_file_a06864
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
