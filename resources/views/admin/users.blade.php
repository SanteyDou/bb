@extends('layouts.admin')

@section('admin_content')

<div class="container-fluid col-sm-11">

<h2>Користувачі</h2>
<div class="text-right" style="margin: -42px 20px 0 0">
  <a class="btn btn-primary" style="margin: 0 0 0 50px" href="{{ route('admin.userAdd') }}"><i class="fas fa-user-plus"></i></a>
</div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Ім'я</th>
          <th class="text-center">Табельний номер</th>
          <th class="text-center">Локація</th>
          <th>Роль</th>
          <th class="text-center">Дія</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($users as $user)
        @if($user->personal_id != 'S13037')
        <tr>
          <td>{{ $user->name }}</td>
          <td class="text-center">{{ $user->personal_id }}</td>
          <td class="text-center">{{ $user->location }}</td>
          <td>@if ($user->is_admin)
                Адміністратор
              @else
                Працівник
              @endif
          </td>
          <td class="text-center">
            <a class="btn btn-success" href="{{ route('admin') }}/user/edit/{{ $user->personal_id }}">
              <i class="fas fa-edit"></i>
            </a>
            <a class="btn btn-danger delete" href="{{ route('admin') }}/user/delete/{{ $user->personal_id }}">
              <i class="far fa-trash-alt"></i>
            </a>
          </td>
        </tr>
        @endif
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

@section('scripts')
  <script>
    var elems = document.getElementsByClassName('delete');
    var confirmIt = function (e) {
        if (!confirm('Ви справді бажаєте видалити користувача?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }

  </script>
@endsection