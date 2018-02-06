@extends('layouts.admin')

@section('admin_content')



<div class="container-fluid">

  <h2>Cклад {{ strtoupper($loc) }}</h2>

  <form action="/admin/{{ $loc }}/add" method="POST" class="col-md-9 offset-md-3">
    {{ csrf_field() }}

    <input type="hidden" name="location" value="{{ $loc }}">

    <div class="form-group">
      <label for="place">Місце на складі</label>
      <input type="text" class="form-control" name="place" placeholder="X01-1" required>
    </div>
    <div class="form-group">
      <label for="matchcode">Матч-код</label>
      <input type="text" class="form-control" name="matchcode" placeholder="XXX 125 XXX" required>
    </div>
    <div class="form-group">
      <label for="category">Категорія</label>
      <select id="category" type="text" class="form-control" name="category" value="" required>
          <option value="">1</option>
          <option value="">2</option>
      {{--    @foreach ()
          <option value="">{{  }}</option>
          @endforeach --}}
      </select> 
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
<br/>
@if ($error)
  <div class="text-center">
      <div class="col-sm-3"> </div>
      <div class="form-group col-sm-6" style="background: LightCoral; border-radius: 5px;">
          <h3>{{ $error }}</h3>
      </div>
  </div>
@endif
@if ($message)
  <div class="text-center">
      <div class="col-sm-3"> </div>
      <div class="form-group col-sm-6" style="background: LightGreen; border-radius: 5px;">
          <h3>{{ $message }}</h3>
      </div>
  </div>
@endif

@endsection