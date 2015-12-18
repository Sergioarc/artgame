<div class="modal fade" id="change-password-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Cambiar mi contraseña
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    {!! Form::open([
                        'id' => 'change-password-form',
                        'class' => 'form-horizontal',
                        'action' => 'Auth\AuthController@putUpdatePassword',
                        'method' => 'PUT'
                    ]) !!}
                        <div class="form-group">
                            {!! Form::label('old_password', 'Contraseña actual', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                                {!! Form::password('old_password', ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('old_password') }}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Nueva contraseña', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Vuelve a escribir la nueva contraseña', ['class' => 'col-sm-4 control-label']) !!}
                            <div class="col-sm-8">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" id="change-password-submit">Cambiar contraseña</button>
            </div>
        </div>
    </div>
</div> 

@section('script')
@parent
<script type="text/javascript">
    $(function(){
        $('#change-password-modal').on('hide.bs.modal', function(){
            $(this).find('form').get(0).reset();
        });

        $('.btn#change-password-submit').click(function(event) {
            $('#change-password-form').submit();
        });
    });
</script>
@endsection