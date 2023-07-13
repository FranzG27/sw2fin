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
    <h3>Gestionar Inventario Sangre</h3>
    <div class="bg-secondary rounded h-100 p-4" >
        <h6 class="mb-4">Inventario:</h6>
        <a class="btn btn-info m-2" href="{{route('users.inventory.crearView')}}">Nuevo Inventario de Sangre</a>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad (Und sangre)</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($inventories as $inventory)
                    <tr>
                        <th>{{$inventory->id}}</th>
                        <th>
                            @php
                            $name=DB::table('blood_types')
                                         ->where('id', '=', $inventory->id_bloodType)
                                         ->first();

                            $name2=$name->name;
                                         
                            @endphp
                            {{$name2}}
                        </th>
                        <th>{{$inventory->quantity}}</th>
                        <th>
                            <a href="{{route('users.inventorye.editarView',$inventory->id)}}" class="btn btn-square btn-warning m-2">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('users.inventory.eliminar', $inventory->id) }}" method="POST" onsubmit="return confirm('¿Está seguro?')">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }} <!-- Utilizar method_field() para establecer el método DELETE -->
                                <button type="submit" class="btn btn-square btn-danger m-2"><i class="fa fa-trash"></i></button>
                            </form>
                              
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection