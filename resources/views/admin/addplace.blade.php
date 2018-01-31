@extends('layouts.admin')

@section('admin_content')

<div class="container-fluid">

  <h2>Cклад {{ strtoupper($loc) }}</h2>

  <form action="/admin/{{ $loc }}/add" method="POST" class="col-md-9 offset-md-3">
    {{ csrf_field() }}

    <input type="hidden" name="location" value="{{ $loc }}">

    <div class="form-group">
      <label for="place">Місце на складі</label>
      <input type="text" class="form-control" name="place" placeholder="X01-1">
    </div>
    <div class="form-group">
      <label for="matchcode">Матч-код</label>
      <input type="text" class="form-control" name="matchcode" placeholder="XXX 125 XXX">
    </div>
    <div class="form-group">
      <label for="min-quantity">Мінімальна кількість</label>
      <input type="text" class="form-control" name="min-quantity" placeholder="123">
    </div>
    <div class="form-group text-right">
      <button type="submit" class="btn btn-primary">Додати</button>
    </div>
  </form>

</div>

@endsection