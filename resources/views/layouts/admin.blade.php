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
                    <a class="nav-link active" href="/admin/che" style="padding: 10px 50px">
                      Чернівці
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="/admin/cho" style="padding: 10px 50px">
                      Чортків
                    </a>
                  </li>
                </ul>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file"></span>
                  Користувачі
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Залишки
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Логи
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
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

<!-- <nav class="nav flex-column">
  <li class="nav-item dropdown-menu">
    <h6 class="dropdown-header">Склади по локаціям</h6>
    <a class="dropdown-item" href="#" style="padding: 5px 40px">- Тернопіль</a>
    <a class="dropdown-item" href="#" style="padding: 5px 40px">- Чернівці</a>
    <a class="dropdown-item" href="#" style="padding: 5px 40px">- Чортків</a>
    <a class="dropdown-item" href="#">Залишки</a>
    <a class="dropdown-item" href="#">Працівники</a>
    <a class="dropdown-item" href="#">Історія</a>
  </li>
</nav> -->