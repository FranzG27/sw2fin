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
    <h3>Todas las Ficha de Prestamo</h3>
    <div class="bg-secondary rounded h-100 p-4" >
        <h6 class="mb-4">Ficha de Prestamos:</h6>
        <a class="btn btn-info m-2" href="{{route('users.applicants.index')}}">Nueva Ficha de Prestamo</a>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Fecha Accidente</th>
                    <th scope="col">Hospital</th>
                    <th scope="col">Doctor a cargo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Cantidad de Sangre</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($files as $file)
                    <tr>
                        <th>{{$file->id}}</th>
                        <th>
                            @php
                            $namePatient=DB::table('applicants')
                                         ->where('id', '=', $file->id_applicant)
                                         ->first();

                            $name=$namePatient->fullName;
                                         
                            @endphp
                            {{$name}}
                        </th>
                        <th>{{$file->accidentDate}}</th>
                        <th>{{$file->nameHospital}}</th>
                        <th>{{$file->nameDoctor}}</th>
                        <th>{{$file->description}}</th>
                        <th>{{$file->quantity}} und</th>
                        <th>
                            @php
                            $status=DB::table('loan_statuses')
                                         ->where('id', '=', $file->id_status)
                                         ->first();

                            $name=$status->name;
                                         
                            @endphp
                            {{$name}}
                        </th>
                        <th>
                            <a href="{{route('users.loanFile.editarView',$file->id)}}" class="btn btn-square btn-warning m-2">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('users.loanFile.eliminar',$file->id) }}" method="POST" onsubmit="return confirm('¿Está seguro?')">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }} <!-- Utilizar method_field() para establecer el método DELETE -->
                                <button type="submit" class="btn btn-square btn-danger m-2"><i class="fa fa-trash"></i></button>
                            </form>

                            <a href="{{route('users.returnFiles.index',$file->id)}}" class="btn btn-info rounded-pill m-2">
                                Ver Fichas de Devolucion
                            </a>
                              
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection