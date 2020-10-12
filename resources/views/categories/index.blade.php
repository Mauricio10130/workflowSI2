@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2>
                    Estados
                    @include('categories.modal-create')
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
                    @foreach($categories as $category)
                        @include('categories.modal-delete')
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>
                                @include('categories.modal-edit')

                                <a href="{{ route('categorias.show', $category->id) }}">
                                    <button type="button" class="btn btn-secondary btn-sm"><i
                                            class="far fa-eye"></i></button>
                                </a>

                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editCategory{{$category->id}}">
                                    <i class="far fa-edit"></i>
                                </button>

                                <button type="button" class="btn btn-danger btn-sm " data-toggle="modal"
                                        data-target="#modalEliminar-{{ $category->id }}">
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
