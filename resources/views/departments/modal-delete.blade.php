<!-- Modal -->
<div class="modal fade" id="modalEliminar-{{ $department->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Departamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estas seguro que quieres eliminar el Departamento <strong>{{ $department->name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Canelar</button>

                {!! Form::open(['action' => ['DepartmentsController@destroy', $department->id], 'method' => 'delete']) !!}
                {{ Form::token() }}
                <button type="submit" class="btn btn-primary">Si</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
