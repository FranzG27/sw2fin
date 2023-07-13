@extends('Donor.dashboard')
@section('contenido')
@if ($errors->any())
<div class="alert alert-primary">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<h1>Crear Ficha medica</h1>
<div class="bg-secondary rounded h-100 p-4">
    <form method="POST" action="{{route('donors.fichaCrear')}}">
        @csrf
        @method('POST')
    
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha </label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputEmail3" name="date">
            </div>
        </div>

        

        

       

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Estado</label>
            <div class="col-sm-10">
                <select class="form-select" name="isAccepted" aria-label="Default select example">
                    <option selected="">Muestra aceptada?</option>
                    <option value="1">Aceptada</option>
                    <option value="2">No Aceptado</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Crear Ficha medica</button>
    </form>
</div>
@endsection