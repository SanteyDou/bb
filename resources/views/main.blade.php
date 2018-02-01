@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Прихід-розхід склад Brett-Bau</h3></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('main') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('personal_id') ? ' has-error' : '' }}">
                            <label for="personal_id" class="col-md-3 control-label">Табельний номер</label>

                            <div class="col-md-2">
                                <input id="personal_id" type="text" class="form-control" name="personal_id" value="{{ old('personal_id') }}" placeholder="S12345" required autofocus>

                                @if ($errors->has('personal_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('personal_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="location" class="col-md-2 control-label">Локація</label>

                            <div class="col-md-3">
                                <select id="location" type="test" class="form-control" name="location" value="{{ old('location') }}" required>
                                    <option value="ter">Тернопіль</option>
                                    <option value="che">Чернівці</option>
                                    <option value="cho">Чортків</option>
                                </select>    
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                            <label for="place" class="col-md-3 control-label">Місце</label>

                            <div class="col-md-7">
                                <input id="place" type="text" class="form-control" name="place" value="{{ old('place') }}" placeholder="X00-0" required>

                                @if ($errors->has('place'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('matchcode') ? ' has-error' : '' }}">
                            <label for="matchcode" class="col-md-3 control-label">Матч код</label>

                            <div class="col-md-5">
                                <input id="matchcode" type="text" class="form-control" name="matchcode" value="{{ old('matchcode') }}" required>
                            </div>
                            <div class="col-md-2">
                                <button id="search" type="button" class="btn btn-default form-control">
                                    Пошук
                                </button>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            
                            <label for="quantity" class="col-md-3 control-label">Кількість</label>

                            <div class="col-md-3">
                                <input id="quantity" type="text" name="quantity" class="form-control" required>
                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2">
                                <button id="minus" type="button" class="btn btn-info form-control" style="font-size: 26px; padding: 0">
                                    - 1
                                </button>
                            </div>

                            <div class="col-md-2">
                                <button id="plus" type="button" class="btn btn-info form-control" style="font-size: 26px; padding: 0">
                                    + 1
                                </button>
                            </div>

                        </div>

                        <div class="text-center">

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="action" id="remove" value="remove" checked>
                                <label class="form-check-label" for="remove">
                                    Взяти зі складу
                                </label>
                                <input class="form-check-input" type="radio" name="action" id="add" value="add" style="margin:0 0 0 50px">
                                <label class="form-check-label" for="add">
                                    Внести на склад
                                </label>
                            </div>
                            
                            <div class="form-group">
                                <button id="btn-take" type="submit" class="btn btn-info btn-lg form-control-lg">
                                    Внести в базу
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
