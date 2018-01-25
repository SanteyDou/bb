@extends('layouts.app')

@section('content') 
<form class="col-md-4 col-md-offset-4">
    <div class="form-group">
        <label for="ID">Табельний номер</label>
        <input type="text" class="form-control" id="person_id" placeholder="Введіть табельний в форматі S12345">
    </div>    
    <div class="form-group">
        <label for="location">Локація</label>
        <select class="custom-select form-control" id="location">
            <option selected value="TER">Тернопіль</option>        
            <option value="other">...</option>
        </select>
    </div>
    <div class="form-group">
        <label for="place">Місце</label>
        <input type="text" class="form-control" id="place" placeholder="Місце на складі">
    </div>
    <div class="form-group">
        <label for="match-code">Матчкод</label>
        <input type="text" class="form-control" id="match-code" placeholder="Матчкод">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection