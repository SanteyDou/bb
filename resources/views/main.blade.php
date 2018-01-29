@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Склад</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('personal_id') ? ' has-error' : '' }}">
                            <label for="personal_id" class="col-md-3 control-label">Табельний номер</label>

                            <div class="col-md-2">
                                <input id="personal_id" type="text" class="form-control" name="personal_id" value="{{ old('personal_id') }}" required autofocus>

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
                                <input id="place" type="text" class="form-control" name="place" required>

                                @if ($errors->has('place'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="matchcode" class="col-md-3 control-label">Матч код</label>

                            <div class="col-md-5">
                                <input id="matchcode" type="text" class="form-control" name="matchcode" required>
                            </div>
                            <div class="col-md-2">
                                <button id="search" type="button" class="btn btn-default form-control">
                                    Пошук
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            
                            <label for="number" class="col-md-3 control-label">Кількість</label>

                            <div class="col-md-3">
                                <input id="number" type="text" name="number" class="form-control" required>
                            </div>

                            <div class="col-md-2">
                                <button id="minus" type="button" class="btn btn-info form-control">
                                    -
                                </button>
                            </div>

                            <div class="col-md-2">
                                <button id="plus" type="button" class="btn btn-info form-control">
                                    +
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-7 col-md-offset-3">
                                <button id="btn-take" type="submit" class="btn btn-info btn-lg">
                                    Взяти зі складу
                                </button>
                                <button id="btn-store" type="submit" class="btn btn-info btn-lg col-sm-offset-1">
                                    Повернути на склад
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
