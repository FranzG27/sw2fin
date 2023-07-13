@extends('templates.dashboard')
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

<h1>Editar Ficha Devolucion</h1>
<div class="bg-secondary rounded h-100 p-4">
    <form method="POST" action="{{route('users.returnFile.editar',$fileReturn->id)}}">
        @csrf
        @method('POST')
    
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha de Inicio</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputEmail3" name="startDate" value="{{$fileReturn->startDate}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha de Fin</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputEmail3" name="endDate" value="{{$fileReturn->endDate}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Deuda en unds Sangre</label>
            <div class="col-sm-10">
                <input type="number" min="1" max="10" step="1" class="form-control" id="inputEmail3" name="debt" value="{{$fileReturn->debt}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Estado</label>
            <div class="col-sm-10">
                <select class="form-select" name="isCanceled" aria-label="Default select example">
                    <option selected="">Cancelo la deuda?</option>
                    <option value="1">No Cancelado</option>
                    <option value="2">Cancelado!</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection