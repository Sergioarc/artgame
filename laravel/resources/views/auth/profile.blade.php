@extends('app')

@section('content')

<div class="container">
    <div class="page-header">
        <h2>
            Mi perfil
        </h2>
    </div>

    <div class="row">
        <div class="col-xs-9">
            @include('errors.alert')
            <div class="form-horizontal">
                <div class="form-group">
                    {!! Form::label('email', 'Correo electrónico', ['class' => 'control-label col-sm-3']) !!}
                    <div class="col-sm-9">
                        <p class="form-control-static">
                            {{ Auth::user()->email }}
                        </p>    
                    </div>
                </div>
            </div>

            {!! Form::open([
                'action' => 'Auth\AuthController@putProfile',
                'method' => 'PUT'
            ])!!}
            {!! Form::close() !!}
        </div>
        <div class="col-xs-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Opciones
                    </h3>
                </div>
                <div class="list-group">
                    <a class="list-group-item" href="#" data-toggle="modal" data-target="#change-password-modal">
                        Cambiar contraseña
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('auth.change_password_modal')
@endsection