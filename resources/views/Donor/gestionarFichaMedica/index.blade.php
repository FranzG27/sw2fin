@extends('Donor.dashboard')
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
    <h3>Gestionar FICHA MEDICA</h3>
    <div class="bg-secondary rounded h-100 p-4" >
        <h6 class="mb-4">Fichas:</h6>
        <a class="btn btn-info m-2" href="{{route('donors.fichaCrear.view')}}">Nuevo Ficha</a>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">IsAceptado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($files as $file)
                    <tr>
                        <th>{{$file->id}}</th>
                        <th>{{$file->date}}</th>
                        <th>@php
                            if($file->isAccepted==true){
                                $valor='Muestra Aceptada';
                            }else{
                                $valor='Muestra No Aceptada';
                            }
                        @endphp
                        {{$valor}}</th>
                        <th>
                            {{-- <a href="{{route('users.type.editarView',$file->id)}}" class="btn btn-square btn-warning m-2">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('users.type.eliminar', $file->id) }}" method="POST" onsubmit="return confirm('¿Está seguro?')">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }} <!-- Utilizar method_field() para establecer el método DELETE -->
                                <button type="submit" class="btn btn-square btn-danger m-2"><i class="fa fa-trash"></i></button>
                            </form> --}}
                              
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection