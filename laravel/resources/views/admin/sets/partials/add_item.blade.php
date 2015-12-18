<div class="modal fade" id="modal-add-item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="form-horizontal">
                        {!! Form::hidden('collection', $collection->id) !!}
                        {!! Form::hidden('subcollection', $subcollection->id) !!}
                            
                        <div class="form-group">
                            {!! Form::label('model', 'Modelo', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::select('model', ['Seleccione'], [], ['class' => 'form-control select-dependant', 'disabled' => 'disabled']) !!}
                                <small class="text-danger">{{ $errors->first('model') }}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('model_item', 'Pieza', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::select('model_item', ['Seleccione'], null, ['class' => 'form-control select-dependant', 'disabled' => 'disabled']) !!}
                                <small class="text-danger">{{ $errors->first('model_item') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary btn-submit" disabled="disabled">Añadir</button>
            </div>
        </div>
    </div>              
</div>