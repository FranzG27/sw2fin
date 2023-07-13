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

<h1>Editar Tipo de Estado</h1>
<div class="bg-secondary rounded h-100 p-4">
    <form method="POST" action="{{route('users.statu.editar',$status->id)}}">
        @csrf
        @method('POST')

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="name" value="{{$status->name}}">
            </div>
        </div>
       
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection