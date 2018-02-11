@extends('layouts.admin')

@section('admin_content')

<div class="container-fluid">

  <h2>Додати категорію</h2>

  <form action="{{ route('admin.catAddForm') }}" method="POST" class="col-md-9 offset-md-3">
    {{ csrf_field() }}

    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
      <label for="place">Назва категорії</label>
      <input type="text" class="form-control" value="{{ old('name') }}" name="name" required autofocus>
      @if ($errors->has('name'))
          <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
      @endif
    </div>
    
    <div class="form-group text-right">
      <button type="submit" class="btn btn-primary">Додати</button>
    </div>
  </form>

</div>

@endsection