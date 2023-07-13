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

<h1>Crear Usuarios</h1>
<div class="bg-secondary rounded h-100 p-4">
    <form method="POST" action="{{route('users.usuarios.crear')}}">
        @csrf
        @method('POST')

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre Completo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" name="email">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" name="password">
            </div>
        </div>

        <select class="form-select mb-3" aria-label="Default select example" name="isAdmin">
            <option selected="">Selecciona el tipo de Usuario</option>
            <option value="1">Administrador</option>
            <option value="2">Usuario normal</option>
        </select>

        <button type="submit" class="btn btn-primary">Crear Usuario</button>
    </form>
</div>
@endsection