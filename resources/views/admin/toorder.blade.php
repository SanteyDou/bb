@extends('layouts.admin')

@section('admin_content')

  <div class="container-fluid col-sm-10">
    <h2>Min Store</h2>
    <h3>+ Фільтр</h3>
        
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Локація</th>
              <th>Місце</th>
              <th>Матч-код</th>
              <th>Кількість</th>
              <th>Мінімальна кількість</th>
            </tr>
          </thead>
          <tbody>

          @foreach ($objStorage as $storage)
            <tr>
              <td>{{ $storage->location }}</td>
              <td>{{ $storage->place }}</td>
              <td>{{ $storage->matchcode }}</td>
              <td>{{ $storage->quantity }}</td>
              <td>{{ $storage->min_quantity }}</td>
            </tr>
          @endforeach          
            
          </tbody>
        </table>
      </div>
    </div>


@endsection