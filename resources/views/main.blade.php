@extends('layouts.app')

@section('content')

<div class="container">
    <div class="text-center">
    <form id="" method="GET" action="">
        {{ csrf_field() }}
        <select id="location_search" type="text" name="location" class="form-group{{ $errors->has('personal_id') ? ' has-error' : '' }}" value="" required style="border-radius: 4px; border: 1px solid transparent; padding: 6px 16px; border-color: #ccc;">
            <option value="ter">Тернопіль</option>
            <option value="che" disabled>Чернівці</option>
            <option value="cho" disabled>Чортків</option>
        </select>
        <select id="category_id_search" type="text" name="category_id" value="{{ old('category') }}" required style="border-radius: 4px; border: 1px solid transparent; padding: 6px 16px; border-color: #ccc;">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>    
        @if ($errors->has('category'))
            <span class="help-block">
                <strong>{{ $errors->first('category') }}</strong>
            </span>
        @endif
        <input type="text" name="matchcode" placeholder="матчкод" style="border-radius: 4px; border: 1px solid transparent; padding: 6px 16px; border-color: #ccc;">
        <a type="" id="main-search" class="btn btn-default">Пошук</a>
    </form>
    </div>

    <div id="show" class="table-responsive">
        <table id="search-table" class="table table-striped table-sm text-center">
          <thead>
            <tr>
              <th class="text-center">Місце</th>
              <th class="text-center">Матч-код</th>
              <th class="text-center">Кількість</th>
            </tr>
          </thead>
          <tbody id="table-search">
                    
          </tbody>
        </table>

    </div>
    <br/>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- <div class="panel-heading text-center"><h3>Прихід-розхід склад Brett-Bau</h3></div> -->

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('main.post') }}">
                        {{ csrf_field() }}
                        <br/>
                        <div id="personal_id" class="form-group{{ $errors->has('personal_id') ? ' has-error' : '' }}">
                            <label for="personal_id" class="col-md-3 control-label">Табельний номер</label>

                            <div class="col-md-2">
                                <input id="personal_id" type="text" class="form-control" name="personal_id" value="{{ old('personal_id') }}" placeholder="S12345" required autofocus>

                                @if ($errors->has('personal_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('personal_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <label for="location" class="col-md-2 control-label">Локація</label>

                            <div class="col-md-3">
                                <select id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required>
                                    <option value="ter">Тернопіль</option>
                                    <option value="che" disabled>Чернівці</option>
                                    <option value="cho" disabled>Чортків</option>
                                </select>    
                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <br/>
                        <div id="place" class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                            <label for="place" class="col-md-3 control-label">Місце</label>

                            <div class="col-md-7">
                                <input id="place" type="text" class="form-control" name="place" value="" placeholder="X00-0" required>

                                @if ($errors->has('place'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br/>
                        <div id="category" class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                        <label for="location" class="col-md-3 control-label">Категорія</label>
                            <div class="col-md-7">
                                <select id="category_id" type="text" class="form-control" name="category_id" value="{{ old('category') }}" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>    
                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <br/> 
                        <div id="matchcode" class="form-group{{ $errors->has('matchcode') ? ' has-error' : '' }}">
                            <label for="matchcode" class="col-md-3 control-label">Матч код</label>

                            <div class="col-md-7">
                                <input id="matchcode" type="text" class="form-control" name="matchcode" value="{{ old('matchcode') }}" required>
                            </div>
                            <!-- <div class="col-md-2">
                                <button id="search" type="button" class="btn btn-default form-control">
                                    Пошук
                                </button>
                            </div> -->
                        </div>
                        <br/>
                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            
                            <label for="quantity" class="col-md-3 control-label" style="margin: 0 -10px 0 0">Кількість</label>
                            
                            <div class="col-md-2" style="margin: 0 -10px 0 0">
                                <input id="quantity-aviable" type="text" name="quantity-aviable" class="form-control text-center" value="" style="font-size: 26px; padding: 0" disabled>
                            </div>                           

                            <div class="col-md-2" style="margin: 0 -10px 0 0">
                                <input id="quantity" type="text" name="quantity" class="form-control text-center font-weight-bold" value="" style="font-size: 26px; padding: 0" required>
                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-2" style="margin: 0 -10px 0 0">
                                <button id="minus1" type="button" class="btn btn-info form-control" style="font-size: 26px; padding: 0;">
                                    - 1
                                </button>
                            </div>

                            <div class="col-md-2" style="margin: 0 -10px 0 0">
                                <button id="plus1" type="button" class="btn btn-info form-control" style="font-size: 26px; padding: 0">
                                    + 1
                                </button>
                            </div>

                        </div>
                        <br/>
                        <div class="text-center">

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="action" id="remove" value="-" checked>
                                <label class="form-check-label" for="remove">
                                    Взяти зі складу
                                </label>
                                <input class="form-check-input" type="radio" name="action" id="add" value="+" style="margin:0 0 0 50px">
                                <label class="form-check-label" for="add">
                                    Повернути на склад
                                </label>
                            </div>
                            <br/>
                            <div class="form-group">
                                <button id="btn-take" type="submit" class="btn btn-info btn-lg form-control-lg">
                                    Внести в базу
                                </button>
                            </div>
                        </div>        

                    </form>

                    @if (session()->has('error'))
                    <div class="text-center">
                        <div class="col-sm-3"> </div>
                        <div class="form-group col-sm-6" style="background: LightCoral; border-radius: 5px;">
                            <h2>{{ session('error') }}</h2>
                        </div>
                    </div>
                    @endif

                    @if (session()->has('message'))
                    <div class="text-center">
                        <div class="col-sm-3"> </div>
                        <div class="form-group col-sm-6" style="background: LightGreen; border-radius: 5px;">
                            <h2>{{ session('message') }}</h2>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    var  quantity = 0;
    $('#plus1').click(function(){
        quantity++;
        $('#quantity').val(quantity);
    });

    $('#minus1').click(function(){
        if(quantity > 0) {
            quantity--;
        }
        $('#quantity').val(quantity);
    })

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#personal_id").keypress(function(e) {

        if(e.which == 13) {
            var personal_id = $("input[name=personal_id]").val();
            
            $.ajax({
                type:'GET',

                url:'ajaxRequestUser',

                data:{personal_id:personal_id},

                success:function(data){
                    $("select[name=location]").val(data.location);
                    $('#personal_id').removeClass('has-error');
                },

                error:function(data){
                    $("input[name=personal_id]").val('');
                    $('#personal_id').addClass('has-error');
                }

            });

        }

    });

    $("#place").keypress(function(e) {
        if(e.which == 13) {
            var place = $("input[name=place]").val();
            
            $.ajax({
                type:'GET',

                url:'ajaxRequestByPlace',

                data:{place:place},

                success:function(data){
                    $("select[name=category_id]").val(data.category_id);
                    $("input[name=matchcode]").val(data.matchcode);
                    $("input[name=quantity-aviable]").val(data.quantity);
                    $('#place').removeClass('has-error');
                },

                error:function(data){
                    $('#place').addClass('has-error');
                }
            });

        }

    });

    // $("#search").on('click', function(e) {
    //     var matchcode = $("input[name=matchcode]").val();
    //     var category_id = $("select[name=category_id]").val();

    //     $.ajax({
    //         type:'GET',
    //         url:'ajaxRequestByMatchcode',
    //         data:{matchcode:matchcode, category_id:category_id},

    //         success:function(data){
    //             $("input[name=place]").val(data.place);
    //             $("input[name=quantity-aviable]").val(data.quantity);
    //             $('#matchcode').removeClass('has-error');
    //             $('#category').removeClass('has-error');

    //         },

    //         error:function(data){
    //             $("input[name=matchcode]").val('');
    //             $('#matchcode').addClass('has-error');
    //             $('#category').addClass('has-error');


    //         }

    //     });

    // });

    $("#main-search").on('click', function(e) {
        var location = $("select[name=location]").val();
        var matchcode = $("input[name=matchcode]").val();
        var category_id = $("select[name=category_id]").val();

        $("#search-table > tbody").html("");

        $.ajax({
            type:'GET',
            url:'ajaxRequestSearch',
            data:{matchcode:matchcode, category_id:category_id, location:location},

            success:function(data){

                console.log(data);
                $('#search-table').append(
                $.map(data, function (item, index) {
                    return '<tr><td>' + item.place +
                    '</td><td>' + item.matchcode +
                    '</td><td>' + item.quantity + '</td></tr>';
                }).join());

            },

        });

    });

</script>

@endsection
