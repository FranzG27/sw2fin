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

<h1>Crear Muestra de Sangre</h1>
<div class="bg-secondary rounded h-100 p-4">
    <form method="POST" action="{{route('users.sample.crear')}}">
        @csrf
        @method('POST')
    
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha de Muestra</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputEmail3" name="date">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Donador</label>
            <div class="col-sm-10">
                <select class="form-select" name="id_donor" aria-label="Default select example">
                    {{-- <option selected>Selecciona la apunte del apunte</option> --}}
                    @foreach ($donors as $donor)
                        <option value="{{ $donor->id }}">{{ $donor->fullName }}</option>
                    @endforeach
            </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo de Sangre</label>
            <div class="col-sm-10">
                <select class="form-select" name="id_type" aria-label="Default select example">
                    {{-- <option selected>Selecciona la apunte del apunte</option> --}}
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
            </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Paciente</label>
            <div class="col-sm-10">
                <select class="form-select" name="id_returnFile" aria-label="Default select example">
                    {{-- <option selected>Selecciona la apunte del apunte</option> --}}
                    <option selected="" value="-1">Ninguno</option>
                    @foreach ($files as $file)
                        <option value="{{ $file->id }}">{{ $file->startDate }}</option>
                    @endforeach
            </select>
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

        <button type="submit" class="btn btn-primary">Crear Muestra</button>
    </form>
</div>
@endsection