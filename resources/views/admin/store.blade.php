@extends('layouts.admin')

@section('admin_content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <div>
    <h2>Cклад {{ $loc }}</h2>
    <div class="text-right" style="margin: -42px 20px 0 0">
      <input type="text" name="search" placeholder="матчкод" style="border-radius: 4px; border: 1px solid transparent; padding: 6px 16px; border-color: #ccc;">
      <button class="btn btn-default">Пошук</button>
      <button class="btn btn-info" style="margin: 0 0 0 50px">Додати місце</button>
    </div>
  </div>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Місце</th>
            <th>Матч-код</th>
            <th>Назва елемента</th>
            <th>Кількість</th>
            <th>Дія</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1,001</td>
            <td>Lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
          <tr>
            <td>1,001</td>
            <td>Lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
          <tr>
            <td>1,001</td>
            <td>Lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
          <tr>
            <td>1,001</td>
            <td>Lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
          <tr>
            <td>1,001</td>
            <td>Lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
          
        </tbody>
      </table>
    </div>
</main>

@endsection