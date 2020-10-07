@extends('layouts.app')

@section('content')
    {!! Form::open(['action' => ['RoleController@update', $role->id], 'method' => 'PATCH']) !!}
    {{ Form::token() }}
    <div class="card text-center mx-auto" style="width: 250px;">
        <div class="card-header">
            <input type="text" class="form-control" style="text-align:center" value="Editar Rol" readonly>
        </div>
        <div class="card-body">
            <textarea name="name" class="form-control" rows="6">{{ $role->name }}</textarea>
        </div>
        <div class="card-footer text-muted small">
            {{ $role->updated_at }}

            <button type="submit" class="btn btn-info btn-sm float-right">
                <i class="far fa-save"></i>
            </button>

            <a href="{{URL::action('RoleController@index')}}">
                <button type="button" class="btn btn-danger btn-sm float-right mr-1">
                    <i class="far fa-window-close"></i>
                </button>
            </a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
