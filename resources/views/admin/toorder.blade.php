@extends('layouts.admin')

@section('admin_content')

  <div class="container-fluid col-sm-10">
    <h2>Min Store</h2>
        
      <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
          <thead>
            <tr>
              <th class="text-center">Локація</th>
              <th class="text-center">Місце</th>
              <th class="text-center">Матч-код</th>
              <th class="text-center">Категорія</th>
              <th class="text-center">Кількість</th>
              <th class="text-center">Мінімальна кількість</th>
            </tr>
          </thead>
          <tbody>

          @foreach ($objStorage as $storage)
            <tr>
              <td>{{ $storage->location }}</td>
              <td>{{ $storage->place }}</td>
              <td>{{ $storage->matchcode }}</td>
              <td>{{ $storage->category->name }}</td>
              <td>{{ $storage->quantity }}</td>
              <td>{{ $storage->min_quantity }}</td>
            </tr>
          @endforeach          
            
          </tbody>
        </table>
        <div class="text-right">
          {{ $objStorage->links() }}
        </div>
      </div>
    </div>


@endsection