@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h2>Lista de Empleados Registrados <a href="empleados/create">
                <button type="button" class="btn btn-success">Agregar Empleado</button>
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
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    @foreach($roles as $role)
                        @if($role->id == 4)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    {{ $user->department }}
                                </td>
                                <td>
                                    <img src="{{ asset('imagenes/'.$user->imagen) }}" alt="{{ $user->imagen }}"
                                         height="50px" width="50px">
                                </td>
                                <td>
                                    <form action="{{ route('empleados.destroy', $user->id) }}" method="POST">
                                        <a href="{{ route('empleados.show', $user->id) }}">
                                            <button type="button" class="btn btn-secondary btn-sm"><i
                                                    class="far fa-eye"></i></button>
                                        </a>
                                        <a href="{{ route('empleados.edit', $user->id) }}">
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
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    {{--        {{ $users->links() }}--}}

@endsection
