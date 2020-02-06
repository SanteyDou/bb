@extends('layouts.app')
    
@section('content')

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-2 col-md-2 ">
            
            <div class="panel panel-default">              
              <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ route('admin.cat') }}">
                    Категорії</a>
                </h4>
              </div>
              <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="{{ route('admin.users') }}">
                    Користувачі</a>
                </h4>
              </div>

            <div class="panel-group" id="accordion">

              <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#ter">
                        Тернопіль</a>
                    </h4>
                </div>
                <div id="ter" class="panel-collapse collapse {{ ($loc == 'ter') ? 'in' : '' }}">
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <a href="{{ route('admin') }}/ter">Склад</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ route('admin') }}/ter/toorder">Дозамовити</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ route('admin') }}/ter/logs">Логи</a>
                                </td>
                            </tr>
                        </table>
                    </div>            
                </div>
              </div>   


              <div class="panel">
                <div class="panel-heading">
                  <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#che">
                      Чернівці</a>
                  </h4>
                </div>
                <div id="che" class="panel-collapse collapse {{ ($loc == 'che') ? 'in' : '' }}">
                  <div class="panel-body">
                      <table class="table">
                          <tr>
                              <td>
                                  <a href="{{ route('admin') }}/che">Склад</a>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <a href="{{ route('admin') }}/che/toorder">Дозамовити</a>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <a href="{{ route('admin') }}/che/logs">Логи</a>
                              </td>
                          </tr>
                      </table>
                  </div> 
                </div>           
              </div>   


              <div class="panel">
                <div class="panel-heading">
                  <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#cho">
                      Чортків</a>
                  </h4>
                </div>
                <div id="cho" class="panel-collapse collapse {{ ($loc == 'cho') ? 'in' : '' }}">
                  <div class="panel-body">
                      <table class="table">
                          <tr>
                              <td>
                                  <a href="{{ route('admin') }}/cho">Склад</a>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <a href="{{ route('admin') }}/cho/toorder">Дозамовити</a>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <a href="{{ route('admin') }}/cho/logs">Логи</a>
                              </td>
                          </tr>
                      </table>
                  </div> 
                </div>           
              </div>  

              <div class="panel">
                <div class="panel-heading">
                  <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#choprd">
                      Чортків Виробництво</a>
                  </h4>
                </div>
                <div id="choprd" class="panel-collapse collapse {{ ($loc == 'choprd') ? 'in' : '' }}">
                  <div class="panel-body">
                      <table class="table">
                          <tr>
                              <td>
                                  <a href="{{ route('admin') }}/choprd">Склад</a>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <a href="{{ route('admin') }}/choprd/toorder">Дозамовити</a>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <a href="{{ route('admin') }}/choprd/logs">Логи</a>
                              </td>
                          </tr>
                      </table>
                  </div> 
                </div>           
              </div>  

              <div class="panel">
                <div class="panel-heading">
                  <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#khm">
                      Хмельницький</a>
                  </h4>
                </div>
                <div id="khm" class="panel-collapse collapse {{ ($loc == 'khm') ? 'in' : '' }}">
                  <div class="panel-body">
                      <table class="table">
                          <tr>
                              <td>
                                  <a href="{{ route('admin') }}/khm">Склад</a>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <a href="{{ route('admin') }}/khm/toorder">Дозамовити</a>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <a href="{{ route('admin') }}/khm/logs">Логи</a>
                              </td>
                          </tr>
                      </table>
                  </div> 
                </div>           
              </div>  


            </div>
          </div>        
        </div>      


        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          @yield('admin_content')
        </main>

    </div>
  </div>

@endsection