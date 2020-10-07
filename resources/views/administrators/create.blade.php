@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>Crear Nuevo Administrador</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <form action="/administradores" method="POST" enctype="multipart/form-data"> <!--Método que permite ingresar datos-->
            @csrf

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Ingrese su Nombre">
                </div>
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="algo@gmail.com">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="********">
                </div>
                <div class="form-group col-md-6">
                    <label>Confirme Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="********">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Rol</label>
                    <select name="rol" class="form-control" readonly>
                        @foreach($roles as $role)
                            @if($role->id == 2)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    {{--                    <input type="text" name="rol" class="form-control" placeholder="Cliente" disabled>--}}
                </div>
                <div class="form-group col-md-6">
                    <label>Imagen</label>
                    <input type="file" name="imagen" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
