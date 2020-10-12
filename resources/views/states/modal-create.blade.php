<button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#addStates">
    Crear Estado
</button>


{!! Form::open(['url' => 'estados']) !!}
{{ Form::token() }}
<div class="modal fade" id="addStates" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Estado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nombre del Estado:</label>
                        <input name="name" type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Descripción:</label>
                        <textarea name="description" type="text" class="form-control" id="recipient-name"></textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar Estado</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
