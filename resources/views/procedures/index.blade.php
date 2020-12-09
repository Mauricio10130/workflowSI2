@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h2>Lista de Trámites Registrados <a href="tramites/create">
                    <button type="button" class="btn btn-success">Agregar Trámite</button>
                </a></h2>
        </div>
    </div>
    {{--        <h6>--}}
    {{--            --}}{{--            @if($search)--}}
    {{--            --}}{{--                <div class="alert alert-primary" role="alert">--}}
    {{--            --}}{{--                    Los resultados para tu búsqueda '{{ $search }}' son:--}}
    {{--            --}}{{--                </div>--}}
    {{--            --}}{{--            @endif--}}
    {{--        </h6>--}}

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Trámite</th><!--Nombre del tipo de trámite-->
                        <th scope="col">Cliente</th><!--email-->
                        <th scope="col">Empleado</th><!--nombre-->
                        <th scope="col">Estado</th><!--nombre del estado-->
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($procedures as $procedure)
                        @foreach($users as $user)
                            {{--                            @if($role->id == 4)--}}
                            <tr>
                                <th scope="row">{{$procedure->id}}</th>
                                <td>{{ $procedure->category}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{ $procedure->state }}</td>
                                <td>
                                    <form action="{{ route('tramites.destroy', $procedure->id) }}" method="POST">
                                        <a href="{{ route('tramites.show', $procedure->id) }}">
                                            <button type="button" class="btn btn-secondary btn-sm"><i
                                                    class="far fa-eye"></i></button>
                                        </a>
                                        <a href="{{ route('tramites.edit', $procedure->id) }}">
                                            <button type="button" class="btn btn-primary btn-sm"><i
                                                    class="far fa-edit"></i>
                                            </button>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            {{--                            @endif--}}
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--        {{ $users->links() }}--}}


@endsection
