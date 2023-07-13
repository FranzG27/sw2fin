@extends('templates.login')
@section('titulo')
    Usuario
@endsection

@section('formulario')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

    @endif
    <form action="{{route('users.login')}}" method="POST">
    {{ csrf_field() }}

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-4">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-4">
            <input type="submit" class="btn btn-primary py-3 w-100 mb-4" value="Iniciar Sesion" />
        </div>

    </form>
@endsection
