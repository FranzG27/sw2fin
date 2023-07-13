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

<h1>Crear Inventario de Sangre</h1>
<div class="bg-secondary rounded h-100 p-4">
    <form method="POST" action="{{route('users.inventory.crear')}}">
        @csrf
        @method('POST')

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Tipo de Sangre</label>
            <div class="col-sm-10">
                <select class="form-select" name="id_bloodType" aria-label="Default select example">
                    {{-- <option selected>Selecciona la apunte del apunte</option> --}}
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
            </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Cantidad</label>
            <div class="col-sm-10">
                <input type="number" min="1" max="9000" step="1" class="form-control" id="inputEmail3" name="quantity">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Crear Inventario de Sangre</button>
    </form>
</div>
@endsection