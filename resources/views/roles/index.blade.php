@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2>
                    Roles de Usuarios
                    @include('roles.modal')
                </h2>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        @include('roles.modal-delete')
                        <tr>
                            <th scope="row">{{$role->id}}</th>
                            <td>{{$role->name}}</td>
                            <td>
                                <a href="{{ URL::action('RoleController@edit', $role->id) }}">
                                    <button type="button" class="btn btn-info btn-sm ">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm " data-toggle="modal"
                                        data-target="#modalEliminar-{{ $role->id }}">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
