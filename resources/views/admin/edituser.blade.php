@extends('layouts.admin')

@section('admin_content')

<div class="container-fluid">

  <h2>Редагувати користувача</h2>

  <form action="{{ route('admin') }}/user/edit/{{ $user->personal_id }}" method="POST" class="col-md-9 offset-md-3">
    {{ csrf_field() }}

    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
      <label for="place">Ім'я</label>
      <input type="text" class="form-control" value="{{ $user->name }}" name="name" placeholder="Іван Іваненко" required>
      @if ($errors->has('name'))
          <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('personal_id') ? ' has-error' : '' }}">
      <label for="personal_id">Табельний номер</label>
      <input type="text" class="form-control" name="personal_id" value="{{ $user->personal_id }}" placeholder="S12345" required>
      @if ($errors->has('personal_id'))
          <span class="help-block">
              <strong>{{ $errors->first('personal_id') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">e-mail</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

    </div>

    <div class="form-group">
    <label for="location">Локація</label>
        <select id="location"  type="text" class="form-control" name="location" value="" required>
            <option value=""></option>
            <option value="ter">Тернопіль</option>
            <option value="che">Чернівці</option>
            <!-- <option value="che2">Чернівці 2</option> -->
            <option value="cho">Чортків</option>
            <option value="khm">Хмельницький</option>
            <option value="ori">Оріон</option>
        </select>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="admin" id="user" value="0" required>
        <label class="form-check-label" for="user">
            Користувач
        </label>
        <input class="form-check-input" type="radio" name="admin" id="admin" value="1" style="margin: 0 0 0 50px">
        <label class="form-check-label" for="admin">
            Адміністратор
        </label>

    </div>

    <div class="form-group text-right">
      <button type="submit" class="btn btn-primary">Змінити</button>
    </div>
  </form>

</div>

@endsection