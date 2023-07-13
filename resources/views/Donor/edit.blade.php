@extends('templates.dashboard')

@section('contenido')
@if ($errors->any())
<div class="alert alert-primary">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h1>Editar Donante</h1>
<div class="bg-secondary rounded h-100 p-4">
    <form method="POST" action="{{ route('donors.update', $donor->id) }}">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <label for="inputFullName" class="col-sm-2 col-form-label">Nombre Completo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputFullName" name="fullName" value="{{ $donor->fullName }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Correo Electrónico</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" name="email" value="{{ $donor->email }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Ingrese la contraseña">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputCi" class="col-sm-2 col-form-label">CI</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCi" name="ci" value="{{ $donor->ci }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputBirthdate" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="inputBirthdate" name="birthdate" value="{{ $donor->birthdate }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputCellphone" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCellphone" name="cellphone" value="{{ $donor->cellphone }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPhoto1" class="col-sm-2 col-form-label">Foto 1</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="inputPhoto1" name="photo1">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPhoto2" class="col-sm-2 col-form-label">Foto 2</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="inputPhoto2" name="photo2">
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
