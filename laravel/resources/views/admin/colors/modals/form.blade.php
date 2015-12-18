
<!-- Modal -->
<div id="create-colors" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crear nuevo color</h4>
            </div>
            
            <div class="modal-body">
        
                <div class="container-fluid">
                    {!! Form::open([
                        'method' => 'POST',
                        'files'  => true,
                        'role'   => 'form',
                        'id'     => 'form-color'
                    ]) !!}

                        {!! Form::hidden('_method', 'POST') !!}
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    {!! Form::label('color-sku', 'SKU') !!}
                                    {!! Form::text('sku', null, ['id' => 'color-sku', 'class' => 'form-control', 'required' => 'required', 'maxlength' => 2]) !!}
                                    <p id="color-sku-static" class="form-control-static">
                                        
                                    </p>
                                    <small class="text-danger">{{ $errors->first('sku') }}</small>
                                </div>
                            </div>

                            <div class="col-sm-9">
                                <div class="form-group">
                                    {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
                                    {!! Form::text('name', null, ['id' => 'color-name', 'class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                            </div>
                        </div>
                        

                         
                        
                        <div class="form-group" id="files-group">
                            {!! Form::label('photo', 'Foto', ['class' => 'control-label']) !!}
                            {!! Form::file('photo', ['class' => 'hide', 'id' => 'input-photo', 'accept' => 'image/*']) !!}
                            <div class="text-center">
                                <img id="img-no-photo-selected" data-src="holder.js/300x300?theme=noir&text=No seleccionada" style="max-width: 100%">
                                <img id="img-photo-selected" style="display:none; max-width: 100%">
                            </div>
                            <div class="text-right up-down-margin">
                                <button class="btn btn-default" href="#" id="btn-add-file" type="button">
                                    <span class="fa fa-plus fa-fw"></span> Seleccionar foto
                                </button>
                                
                            </div>
                            
                        </div>

                    {!!Form::close()!!}
                </div>
        

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button id="color-save" class="btn btn-primary">Guardar</button>
            </div>
        
        </div>
    </div>

</div>