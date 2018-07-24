@extends('layouts.admin')

@section('admin_content')

  <div class="container-fluid">
    <h2>Min Store {{ strtoupper($loc) }}</h2>
        
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
              <th class="text-center">Статус</th>
              <th class="text-center">E-mail вислано</th>
              <th class="text-center">EBM стартовано</th>
              <th class="text-center">Дія</th>
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
              <td>{{ $storage->status }}</td>
              <td>{{ $storage->email_send }}</td>
              <td>{{ $storage->ebm_started }}</td>
              <td class="text-center">
                <a class="btn btn-success" href="{{ route('admin') }}/{{ $loc }}/editorder/{{ $storage->place }}">
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
        <a class="btn btn-info" href="{{ route('admin')}}/{{ $loc }}/toorder/getcsv">Завантажити Excel</a>
      </div>
    </div>


@endsection

@section('script')



@endsection