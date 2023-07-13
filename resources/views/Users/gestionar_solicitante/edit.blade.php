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

<h1>Editar Paciente</h1>
<div class="bg-secondary rounded h-100 p-4">
    <form method="POST" action="{{route('users.applicant.editar',$applicant->id)}}">
        @csrf
        @method('POST')

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre Completo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="fullName" value="{{$applicant->fullName}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Ci</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="ci" value="{{$applicant->ci}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputEmail3" name="birthdate" value="{{$applicant->birthdate}}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Telefono</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="cellphone" value="{{$applicant->cellphone}}">
            </div>
        </div>
       
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection