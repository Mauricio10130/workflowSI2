@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2>
                    Estados
                    @include('states.modal-create')
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
                    @foreach($states as $state)
                        @include('states.modal-delete')
                        <tr>
                            <th scope="row">{{$state->id}}</th>
                            <td>{{$state->name}}</td>
                            <td>
                                @include('states.modal-edit')

                                <a href="{{ route('estados.show', $state->id) }}">
                                    <button type="button" class="btn btn-secondary btn-sm"><i
                                            class="far fa-eye"></i></button>
                                </a>

                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editState{{$state->id}}">
                                    <i class="far fa-edit"></i>
                                </button>

                                <button type="button" class="btn btn-danger btn-sm " data-toggle="modal"
                                        data-target="#modalEliminar-{{ $state->id }}">
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
