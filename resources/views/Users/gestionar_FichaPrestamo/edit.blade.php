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

<h1>Editar Ficha Prestamo</h1>
<div class="bg-secondary rounded h-100 p-4">
    <form method="POST" action="{{route('users.loanFile.editar',$file->id)}}">
        @csrf
        @method('POST')
    
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha de Accidente</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputEmail3" name="accidentDate" value="{{$file->accidentDate}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre del Hospital</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="nameHospital" value="{{$file->nameHospital}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre del Doctor </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="nameDoctor" value="{{$file->nameDoctor}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Descripcion</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="description" value="{{$file->description}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Cantidad de unds Sangre</label>
            <div class="col-sm-10">
                <input type="number" min="1" max="10" step="1" class="form-control" id="inputEmail3" name="quantity" value="{{$file->quantity}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Estado</label>
            <div class="col-sm-10">
                <select class="form-select" name="id_status" aria-label="Default select example">
                    {{-- <option selected>Selecciona la apunte del apunte</option> --}}
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
            </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection