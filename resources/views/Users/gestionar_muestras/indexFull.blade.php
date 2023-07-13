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
    <h3>Gestionar Muestras de Sangre</h3>
    <div class="bg-secondary rounded h-100 p-4" >
        <h6 class="mb-4">Muestras de Sangre:</h6>
        <a class="btn btn-info m-2" href="{{route('users.sample.crearView')}}">Nueva Muestra de sangre</a>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Donante</th>
                    <th scope="col">Tipo de Sangre</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Aprobada</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($samples as $sample)
                    <tr>
                        <th>{{$sample->id}}</th>
                        <th>{{$sample->date}}</th>
                        <th>
                            @php
                            $donor=DB::table('donors')
                                         ->where('id', '=', $sample->id_donor)
                                         ->first();

                            $donor2=$donor->fullName;
                                         
                            @endphp
                            {{$donor2}}
                        </th>
                        <th>
                            @php
                            $type=DB::table('blood_types')
                                         ->where('id', '=', $sample->id_type)
                                         ->first();

                            $type2=$type->name;
                                         
                            @endphp
                            {{$type2}}
                        </th>
                        <th>
                            @php
                            if($sample->id_returnFile == null){
                                $pacient2='Ninguno';
                            }else{
                                $idReturnFile=DB::table('return_files')
                                            ->where('id','=',$sample->id_returnFile)
                                            ->first();

                                $idLoanFile=DB::table('loan_files')
                                                ->where('id','=',$idReturnFile->id_loanFile)
                                                ->first();

                                $pacient=DB::table('applicants')
                                            ->where('id', '=', $idLoanFile->id_applicant)
                                            ->first();

                                $pacient2=$pacient->fullName;
                            }            
                            @endphp
                            {{$pacient2}}
                        </th>
                        <th>
                            @php
                                if($sample->isAccepted==true){
                                    $valor='Muestra Aceptada';
                                }else{
                                    $valor='Muestra No Aceptada';
                                }
                            @endphp
                            {{$valor}} 
                        </th>
                        <th>
                            <form action="{{ route('users.sample.eliminar',$sample->id) }}" method="POST" onsubmit="return confirm('¿Está seguro?')">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }} <!-- Utilizar method_field() para establecer el método DELETE -->
                                <button type="submit" class="btn btn-square btn-danger m-2"><i class="fa fa-trash"></i></button>
                            </form>
                            
                            @if(isset($sample->id_returnFile))
                                <a href="{{ route('users.sample.returnFileView', $sample->id_returnFile) }}" class="btn btn-info rounded-pill m-2">
                                    Ver Fichas de Devolucion
                                </a>
                            @endif                              
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection