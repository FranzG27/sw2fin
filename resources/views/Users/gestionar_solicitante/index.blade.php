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
<div class="" >
    <h3>Gestionar Pacientes</h3>
    <div class="bg-secondary rounded h-100 p-4" >
        <h6 class="mb-4">Pacientes:</h6>
        <a class="btn btn-info m-2" href="{{route('users.applicant.crearView')}}">Nuevo Paciente</a>
        <br>
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

                @foreach ($patients as $patient)
                    <tr>
                        <th>{{$patient->id}}</th>
                        <th>{{$patient->fullName}}</th>
                        <th>{{$patient->ci}}</th>
                        <th>{{$patient->birthdate}}</th>
                        <th>{{$patient->cellphone}}</th>
                        <th>
                            <a href="{{route('users.applicant.editarView',$patient->id)}}" class="btn btn-square btn-warning m-2">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('users.applicant.eliminar',$patient->id) }}" method="POST" onsubmit="return confirm('¿Está seguro?')">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }} <!-- Utilizar method_field() para establecer el método DELETE -->
                                <button type="submit" class="btn btn-square btn-danger m-2"><i class="fa fa-trash"></i></button>
                            </form>

                            <a href="{{route('users.loanFiles.index',$patient->id)}}" class="btn btn-info rounded-pill m-2">
                                Ver Fichas de Prestamo
                            </a>
                              
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection