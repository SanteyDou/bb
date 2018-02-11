@extends('layouts.admin')

@section('admin_content')

  <div class="container-fluid col-sm-11">
    <h2>Логи записів в БД</h2>
  
      <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>Табельний №</th>
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
      </div>
    </div>

@endsection