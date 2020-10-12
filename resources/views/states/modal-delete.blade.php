<!-- Modal -->
<div class="modal fade" id="modalEliminar-{{ $state->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Estado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estas seguro que quieres eliminar el Estado <strong>{{ $state->name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                {!! Form::open(['action' => ['StatesController@destroy', $state->id], 'method' => 'delete']) !!}
                {{ Form::token() }}
                <button type="submit" class="btn btn-primary">Si</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
