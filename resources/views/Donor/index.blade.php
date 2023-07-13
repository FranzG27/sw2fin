@extends('Donor.dashboard')
@section('contenido')
    <h1>BIENVENIDO DONANTE!</h1>
@endsection

{{-- @extends('templates.dashboard')

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
<div class="">
    <h3>Gestionar Donantes</h3>
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Donantes:</h6>
        {{-- <a class="btn btn-info m-2" href="{{ route('donors.create') }}">Nuevo Donante</a> --}}
        {{-- <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Ci</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($donors as $donor)
                    <tr>
                        <th>{{ $donor->id }}</th>
                        <th>{{ $donor->fullName }}</th>
                        <th>{{ $donor->ci }}</th>
                        <th>{{ $donor->birthdate }}</th>
                        <th>{{ $donor->cellphone }}</th>
                        <th>
                             <a href="{{ route('donors.edit', $donor->id) }}" class="btn btn-square btn-warning m-2">
                                <i class="fa fa-edit"></i>
                            </a> 

                             <form action="{{ route('donors.destroy', $donor->id) }}" method="POST" onsubmit="return confirm('¿Está seguro?')">
                                @csrf
                                @method('DELETE') <!-- Utilizar method_field() para establecer el método DELETE -->
                                <button type="submit" class="btn btn-square btn-danger m-2"><i class="fa fa-trash"></i></button>
                            </form>  --}}

                            {{-- <a href="{{ route('donors.loanFiles.index', $donor->id) }}" class="btn btn-info rounded-pill m-2">
                                Ver Fichas de Prestamo
                            </a> --}}
{{--                               
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection --}} 
