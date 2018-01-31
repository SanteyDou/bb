@extends('layouts.admin')

@section('admin_content')

  <div class="container-fluid col-sm-10">
    <h2>Cклад {{ strtoupper($loc) }}</h2>
    <div class="text-right" style="margin: -42px 20px 0 0">
      <input type="text" name="search" placeholder="матчкод" style="border-radius: 4px; border: 1px solid transparent; padding: 6px 16px; border-color: #ccc;">
      <button class="btn btn-default">Пошук</button>
        <a class="btn btn-info" style="margin: 0 0 0 50px" href="/admin/{{ $loc }}/add">Додати місце</a>
    </div>
    
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Місце</th>
              <th>Матч-код</th>
              <th>Кількість</th>
              <th>Мінімальна кількість</th>
              <th>Дія</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($objStorage as $storage)
            <tr>
              <td>{{ $storage->place }}</td>
              <td>{{ $storage->matchcode }}</td>
              <td>{{ $storage->quantity }}</td>
              <td>{{ $storage->min_quantity }}</td>
              <td>sit</td>
            </tr>
          @endforeach
          
            
          </tbody>
        </table>
      </div>
    </div>


@endsection