@extends('layouts.admin')

@section('admin_content')

<div class="container-fluid col-sm-10">

<h2>Категорії</h2>
<div class="text-right" style="margin: -42px 20px 0 0">
  <a class="btn btn-primary" style="margin: 0 0 0 50px" href="cat/add"><i class="far fa-calendar-plus"></i></a>
</div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>№</th>
          <th>Назва категорії</th>
          <th class="text-center">Дія</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($categories as $category)
        <tr>
          <td>{{ $category->id }}</td>
          <td>{{ $category->name }}</td>
         
          <td class="text-center">
            <a class="btn btn-success" href="cat/edit/{{ $category->id }}">
              <i class="fas fa-edit"></i>
            </a>
          </td>
        </tr>
      @endforeach
      
        
      </tbody>
    </table>
  </div>
<br/>
@if (session()->has('error'))
  <div class="text-center">
      <div class="col-sm-3"> </div>
      <div class="col-sm-6" style="background: LightCoral; border-radius: 5px;">
          <h3>{{ session('error') }}</h3>
      </div>
  </div>
@endif
@if (session()->has('message'))
  <div class="text-center">
      <div class="col-sm-3"> </div>
      <div class="col-sm-6" style="background: LightGreen; border-radius: 5px;">
          <h3>{{ session('message') }}</h3>
      </div>
  </div>
@endif

</div>

@endsection