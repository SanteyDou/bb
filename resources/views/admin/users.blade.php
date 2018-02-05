@extends('layouts.admin')

@section('admin_content')

  <div class="container-fluid col-sm-10">
    <h2>Користувачі</h2>
    <div class="text-right" style="margin: -42px 20px 0 0">
      <a class="btn btn-info" style="margin: 0 0 0 50px" href="/admin/user/add">Додати користувача</a>
    </div>
    <h3>+ Фільтр</h3>
    
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Ім'я</th>
              <th>Табельний номер</th>
              <th>Локація</th>
              <th>Роль</th>
              <th>Дія</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->personal_id }}</td>
              <td>{{ $user->location }}</td>
              <td>@if ($user->is_admin)
                    Адміністратор
                  @else
                    Працівник
                  @endif
              </td>
              <td>sit</td>
            </tr>
          @endforeach
          
            
          </tbody>
        </table>
      </div>
    </div>


@endsection