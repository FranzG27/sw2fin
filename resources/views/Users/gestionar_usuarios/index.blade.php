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
    <h3>Gestionar Usuarios</h3>
    <div class="bg-secondary rounded h-100 p-4" >
        <h6 class="mb-4">Usuarios:</h6>
        <a class="btn btn-info m-2" href="{{route('users.usuarios.crearView')}}">Nuevo Usuario</a>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <th>{{$user->id}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        <th>
                            <a href="{{route('users.usuarios.editarView',$user->id)}}" class="btn btn-square btn-warning m-2">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('users.usuarios.eliminar', $user->id) }}" method="POST" onsubmit="return confirm('¿Está seguro?')">
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