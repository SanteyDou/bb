@extends('layouts.admin')

@section('admin_content')

  <div class="container-fluid">
    <h2>Логи записів в БД</h2>
    
    <div class="text-right" style="margin: -42px 20px 0 0">

    <form method="POST" action="{{ route('admin') }}/{{ $loc }}/logs/search">
      {{ csrf_field() }}
      <input type="text" name="place" placeholder="Місце" style="border-radius: 4px; border: 1px solid transparent; padding: 6px 16px; border-color: #ccc;">
      <button type="submit" class="btn btn-default">Пошук</button>
   </form>


    </div>
  
      <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>Табельний №</th>
              <th>Локація</th>
              <th>Дія</th>
              <th>Місце</th>
              <th>Матч-код</th>
              <th>Категорія</th>
              <th>Кількість</th>
              <th>Дата</th>
            </tr>
          </thead>
          <tbody>
          
          @foreach ($logs as $log)
            <tr  @if ($log->action == '+') class="bg-success" @else class="bg-danger" @endif >            
              <td>{{ $log->personal_id }}</td>
              <td>{{ $log->location }}</td>
              <td>{{ $log->action }}</td>
              <td>{{ $log->place }}</td>
              <td>{{ $log->matchcode }}</td>
              <td>{{ $log->category }}</td>
              <td>{{ $log->quantity }}</td>
              <td>{{ $log->created_at }}</td>
            </tr>
          @endforeach          
            
          </tbody>
        </table>

        <div class="text-right">
          {{ $logs->links() }}
        </div> 

        <a class="btn btn-info" href="{{ route('admin')}}/{{ $loc }}/logs/getcsv">Завантажити логи</a>

      </div>
    </div>

@endsection