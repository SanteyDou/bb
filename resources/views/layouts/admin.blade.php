@extends('layouts.app')
    
@section('content')

    <div class="container-fluid">
      <div class="row">
        
        <nav class="col-sm-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                  <div class="nav-link" style="color: #636b6f; padding: 0 15px">Склади по локаціям:</div>
              </li>
                <ul class="nav">
                  <li class="nav-item" >
                    <a class="nav-link active" href="/admin/ter" style="padding: 10px 50px">
                      Тернопіль
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/admin/che" style="padding: 10px 50px">
                      Чернівці
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/admin/cho" style="padding: 10px 50px">
                      Чортків
                    </a>
                  </li>
                </ul>
              <li class="nav-item">
                <a class="nav-link" href="/admin/cat">
                  <span></span>
                  Категорії
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/users">
                  <span></span>
                  Користувачі
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/toorder">
                  <span></span>
                  Залишки
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/logs">
                  <span></span>
                  Логи
                </a>
              </li>              
            </ul>
           
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          @yield('admin_content')
        </main>

    </div>
  </div>

@endsection