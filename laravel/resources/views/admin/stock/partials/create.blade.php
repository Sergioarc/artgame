<div class="modal" id="modal-stock-create">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open([
                'action' => 'Admin\StockController@store',
                'class' => 'form-horizontal'
            ]) !!}

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            {!! Form::label('number', 'Cantidad', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                {!! Form::number('number',old('number'), ['class' => 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('number') }}</small>
                            </div>
                        </div>

                        <fieldset id="no-sku-form">
                            <div class="form-group">
                                {!! Form::label('collection', 'Colección', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::select('collection', [null => 'Seleccione una colección'], null, ['class' => 'form-control select-dependant', 'required' => 'required', 'disabled' => 'disabled']) !!}
                                    <small class="text-danger">{{ $errors->first('collection') }}</small>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('subcollection', 'Subcolección', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::select('subcollection', ['Seleccione una colección'], null, ['class' => 'form-control select-dependant', 'disabled' => 'disabled']) !!}
                                    <small class="text-danger">{{ $errors->first('subcollection') }}</small>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('model', 'Modelo', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::select('model', ['Seleccione una Subcolección'], [], ['class' => 'form-control select-dependant', 'disabled' => 'disabled']) !!}
                                    <small class="text-danger">{{ $errors->first('model') }}</small>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('model_item', 'Pieza', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::select('model_item', ['Seleccione un modelo'], null, ['class' => 'form-control select-dependant', 'disabled' => 'disabled']) !!}
                                    <small class="text-danger">{{ $errors->first('model_item') }}</small>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('color', 'Color', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::select('color', ['Seleccione una pieza'], null, ['class' => 'form-control select-dependant', 'disabled' => 'disabled']) !!}
                                    <small class="text-danger">{{ $errors->first('color') }}</small>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('size', 'Talla', ['class' => 'col-sm-3 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::select('size', ['Seleccione una pieza'], null, ['class' => 'form-control select-dependant', 'disabled' => 'disabled']) !!}
                                    <small class="text-danger">{{ $errors->first('size') }}</small>
                                </div>
                            </div>  
                        </fieldset>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>