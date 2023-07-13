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
    <h3>Ficha de Devolucion</h3>
    <div class="bg-secondary rounded h-100 p-4" >
        <h6 class="mb-4">Ficha de Devolucion:</h6>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col">Deuda</th>
                    <th scope="col">Cancelado</th>
                </tr>
            </thead>
            <tbody>
 
                @foreach ($filesReturn as $fileReturn)
                    <tr>
                        <th>{{$fileReturn->id}}</th>
                        <th>
                            @php
                            $patient=DB::table('loan_files')
                                         ->where('id', '=', $fileReturn->id_loanFile)
                                         ->first();

                            $namePatient=DB::table('applicants')
                                         ->where('id', '=', $patient->id_applicant)
                                         ->first();

                            $name=$namePatient->fullName;
                                         
                            @endphp
                            {{$name}}
                        </th>
                        <th>{{$fileReturn->startDate}}</th>
                        <th>{{$fileReturn->endDate}}</th>
                        <th>{{$fileReturn->debt}}</th>
                        <th>
                            @php
                                if($fileReturn->isCanceled==false){
                                    $estado='No Cancelado';
                                }else {
                                    $estado='Cancelado!';
                                }
                                         
                            @endphp
                            {{$estado}}
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection