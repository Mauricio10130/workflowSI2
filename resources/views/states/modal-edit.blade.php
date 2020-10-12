{{--{!! Form::open(['url' => 'departamentos']) !!}--}}
<form action="{{route('estados.update', $state->id)}}" method="POST">
@method('PATCH')<!--Método que actualiza los datos-->
    {{--{{ Form::token() }}--}}
    @csrf
    <div class="modal fade" id="editState{{$state->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Estado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre del Estado:</label>
                            <input name="name" type="text" class="form-control" id="recipient-name"
                                   value="{{$state->name}}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Descripción:</label>
                            <textarea name="description" type="text" class="form-control"
                                      id="recipient-name">{{$state->description}}</textarea>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar Estado</button>
                </div>
            </div>
        </div>
    </div>
    {{--{!! Form::close() !!}--}}
</form>
