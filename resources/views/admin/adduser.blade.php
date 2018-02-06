@extends('layouts.admin')

@section('admin_content')

<div class="container-fluid">

  <h2>Додати користувача</h2>

  <form action="/admin/user/add" method="POST" class="col-md-9 offset-md-3">
    {{ csrf_field() }}

    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
      <label for="place">Ім'я</label>
      <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Іван Іваненко" required>
      @if ($errors->has('name'))
          <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('personal_id') ? ' has-error' : '' }}">
      <label for="personal_id">Табельний номер</label>
      <input type="text" class="form-control" name="personal_id" value="{{ old('personal_id') }}" placeholder="S12345" required>
      @if ($errors->has('personal_id'))
          <span class="help-block">
              <strong>{{ $errors->first('personal_id') }}</strong>
          </span>
      @endif
    </div>

    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">e-mail</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="ivan.ivanenko@sebn.com">

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

    </div>

    <div class="form-group">
    <label for="location">Локація</label>
    <select id="location" type="test" class="form-control" name="location" value="{{ old('location') }}" required>
        <option value="ter" selected>Тернопіль</option>
        <option value="che">Чернівці</option>
        <option value="cho">Чортків</option>
    </select>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="admin" id="user" value="0" checked>
        <label class="form-check-label" for="user">
            Користувач
        </label>
        <input class="form-check-input" type="radio" name="admin" id="admin" value="1" style="margin: 0 0 0 50px">
        <label class="form-check-label" for="admin">
            Адміністратор
        </label>
        
    </div>
   
    <div class="form-group text-right">
      <button type="submit" class="btn btn-primary">Додати</button>
    </div>
  </form>

</div>

@endsection