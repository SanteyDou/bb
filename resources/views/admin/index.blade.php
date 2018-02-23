@extends('layouts.admin')

@section('admin_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <h2 class="text-center">Панель адміністрування</h2>
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
</main>

@endsection