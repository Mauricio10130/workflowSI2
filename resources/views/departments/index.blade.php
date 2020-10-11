@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2>
                    Departamentos
                    @include('departments.modal')
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
                    @foreach($departments as $department)
                        @include('departments.modal-delete')
                        <tr>
                            <th scope="row">{{$department->id}}</th>
                            <td>{{$department->name}}</td>
                            <td>
                                @include('departments.modal-edit')

                                <a href="{{ route('departamentos.show', $department->id) }}">
                                    <button type="button" class="btn btn-secondary btn-sm"><i
                                            class="far fa-eye"></i></button>
                                </a>

                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editDepartment{{$department->id}}">
                                    <i class="far fa-edit"></i>
                                </button>

                                <button type="button" class="btn btn-danger btn-sm " data-toggle="modal"
                                        data-target="#modalEliminar-{{ $department->id }}">
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
