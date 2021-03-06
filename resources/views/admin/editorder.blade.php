@extends('layouts.admin')

@section('admin_content')



<div class="container-fluid">

  <h2>Cклад {{ strtoupper($loc) }}: Редагування статусу</h2>

  <form action="{{ route('admin') }}/{{ $loc }}/editorder/{{ $storage->place }}" method="POST" class="col-md-9 offset-md-3">
    {{ csrf_field() }}

    <input type="hidden" name="location" value="{{ $loc }}">
    <input type="hidden" name="personal_id" value="{{ Auth::user()->personal_id }}">
    <div class="form-group col-sm-4">
      <label for="place">Місце на складі</label>
      <input type="text" class="form-control" name="place" placeholder="{{ $storage->place }}" required disabled>
    </div>
    <div class="form-group col-sm-4">
      <label for="matchcode">Матч-код</label>
      <input type="text" class="form-control" name="matchcode" value="{{ $storage->matchcode }}" required disabled>
    </div>
    <div class="form-group col-sm-4">
      <label for="category_id">Категорія</label>
      <select id="category_id" type="text" class="form-control" name="category_id" value="$storage->category_id" required disabled>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}" @if ($category->id == $storage->category_id) 
            selected
          @endif>{{ $category->name }}</option>
        @endforeach --}}
      </select> 
    </div>

    <div class="form-group">
      <label for="min-quantity">Статус</label>
      <input type="text" class="form-control" name="status" value="{{ $storage->status }}">
    </div>
    <div class="form-group">
      <label for="min-quantity">e-mail вислано</label>
      <input type="text" class="form-control" id="datepicker1" name="email_send" value="{{ $storage->email_send }}">
    </div>
    <div class="form-group">
      <label for="min-quantity">EBM стартовано</label>
      <input type="text" class="form-control" id="datepicker2" name="ebm_started" value="{{ $storage->ebm_started }}">
    </div>


    <div class="form-group text-right">
      <button type="submit" class="btn btn-primary">Оновити</button>
    </div>
  </form>

</div>
<br/>
@if ($error)
  <div class="text-center">
      <div class="col-sm-2"> </div>
      <div class="form-group col-sm-6" style="background: LightCoral; border-radius: 5px;">
          <h3>{{ $error }}</h3>
      </div>
  </div>
@endif
@if ($message)
  <div class="text-center">
      <div class="col-sm-2"> </div>
      <div class="form-group col-sm-6" style="background: LightGreen; border-radius: 5px;">
          <h3>{{ $message }}</h3>
      </div>
  </div>
@endif

@endsection

@section('scripts')

<script>
  $( function() {
    $( "#datepicker1" ).datepicker();
    $( "#datepicker2" ).datepicker();
  } );
</script>

@endsection