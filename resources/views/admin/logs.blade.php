@extends('layouts.admin')

@section('admin_content')

  <div class="container-fluid col-sm-10">
    <h2>Логи записів в БД</h2>

    {{--  <div class="text-right" style="margin: -42px 20px 0 0">
       <input type="text" name="search" placeholder="матчкод" style="border-radius: 4px; border: 1px solid transparent; padding: 6px 16px; border-color: #ccc;">
      <button class="btn btn-default">Пошук</button> 
        <a class="btn btn-info" style="margin: 0 0 0 50px" href="/admin/{{ $loc }}/add">Додати місце</a>
    </div> --}}
    <h3>+ Фільтр</h3>
    
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Табельний №</th>
              <th>Дія</th>
              <th>Місце</th>
              <th>Матч-код</th>
              <th>Кількість</th>
              <th>Дата</th>
            </tr>
          </thead>
          <tbody>
          
          @foreach ($logs as $log)
            <tr>            
              <td>{{ $log->personal_id }}</td>
              <td>{{ $log->action }}</td>
              <td>{{ $log->place }}</td>
              <td>{{ $log->matchcode }}</td>
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