@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Administradores Registrados <a href="administradores/create">
                <button type="button" class="btn btn-success float-right">Agregar Administrador</button>
            </a></h2>
        <h6>
            @if($search)
                <div class="alert alert-primary" role="alert">
                    Los resultados para tu búsqueda '{{ $search }}' son:
                </div>
            @endif
        </h6>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <th scope="col">Imagen</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                @foreach($user->roles as $role)
                    @if($role->id == 2)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{ $role->name }}
                                @endforeach
                            </td>
                            <td>
                                <img src="{{ asset('imagenes/'.$user->imagen) }}" alt="{{ $user->imagen }}"
                                     height="50px" width="50px">
                            </td>
                            <td>
                                <form action="{{ route('administradores.destroy', $user->id) }}" method="POST">
                                    <a href="{{ route('administradores.show', $user->id) }}">
                                        <button type="button" class="btn btn-secondary btn-sm"><i
                                                class="far fa-eye"></i></button>
                                    </a>
                                    <a href="{{ route('administradores.edit', $user->id) }}">
                                        <button type="button" class="btn btn-primary btn-sm"><i class="far fa-edit"></i>
                                        </button>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
{{--        {{ $users->links() }}--}}

    </div>
@endsection
