@extends('layouts.admin')

@section('admin_content')

  <div class="container-fluid">
    <h2>Cклад {{ strtoupper($loc) }}</h2>

    <div class="text-right" style="margin: -42px 20px 0 0">

      <form method="POST" action="{{ route('admin') }}/{{ $loc }}/search">
        {{ csrf_field() }}
        <input type="hidden" name="location" value="{{ $loc }}">
        <input type="text" name="place" placeholder="місце" style="border-radius: 4px; border: 1px solid transparent; padding: 6px 16px; border-color: #ccc;">
        або
        <input type="text" name="matchcode" placeholder="матчкод" style="border-radius: 4px; border: 1px solid transparent; padding: 6px 16px; border-color: #ccc;">
        <button type="submit" class="btn btn-default">Пошук</button>
        
        <a class="btn btn-primary" style="margin: 0 0 0 50px" href="{{ route('admin') }}/{{ $loc }}/add"><i class="fas fa-cart-plus"></i></a>
      </form>

    </div>
    
      <div class="table-responsive">
        <table class="table table-striped table-sm text-center">
          <thead>
            <tr>
              <th class="text-center">Місце</th>
              <th class="text-center">Матч-код</th>
              <th class="text-center">Категорія</th>
              <th class="text-center">Кількість</th>
              <th class="text-center">Мінімальна кількість</th>
              <th class="text-center">Дія</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($objStorage as $storage)
            <tr>
              <td>{{ $storage->place }}</td>
              <td>{{ $storage->matchcode }}</td>
              <td>{{ $storage->category->name }}</td>
              <td>{{ $storage->quantity }}</td>
              <td>{{ $storage->min_quantity }}</td>
              <td class="text-center">
                <a class="btn btn-success" href="{{ route('admin') }}/{{ $loc }}/edit/{{ $storage->place }}">
                  <i class="fas fa-edit"></i>
                </a>
              </td>
            </tr>
          @endforeach
                    
          </tbody>
        </table>

        <div class="text-right">
            {{ $objStorage->links() }}
        </div>
        <a class="btn btn-info" href="{{ route('admin') }}/getcsv/{{ $loc }}">Завантажити залишки</a>
      </div>
    </div>

@endsection