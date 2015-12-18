@extends('app')

@section('content')
<style>
    #img-home{
        max-width: 100%;
        max-height: 350px;
        vertical-align:middle;
    }
</style>

<div class="container">
    @if($errors->count() > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
    @endif 

    <div class="row">

        <div class="col-sm-5">

            {!!Form::open([
                'action' => 'Auth\AuthController@postLogin',
                'role' => 'form'
            ])!!}

                <div class="text-center">
                    <h1><p>Inicie sesión</p></h1> 
                </div>
                <br>
        

                <div class="form-group">
                    {!!Form::label('email', 'Usuario')!!}
                    {!!Form::email('email', old('email') , ['class' => 'form-control','required'])!!}
                </div>

                <div class="form-group">
                    {!!Form::label('password', 'Contraseña')!!}
                    {!!Form::password('password', ['class' => 'form-control','required'])!!}
                </div>

                <div class="form-group">
                    
                    <div class="checkbox">
                        <label for="remember">
                            {!!Form::checkbox('remember', true, false, ['id' => 'remember'])!!} Recordar contraseña
                        </label>
                    </div>
                    
                </div>

                <div class="form-group text-center">
                    {!!Form::submit('Enviar', ['class' => 'btn btn-primary'])!!}
                </div>

            {!!Form::close()!!}
        </div>

        <div class="col-sm-1">
        <center>
            <div style="border-left: 1px solid #ccc; width:1px; height:600px;"></div>
        </center>
            
        </div>

        <div class="col-sm-6">

            @if($errors->register->count() > 0)
                <div class="alert alert-danger">
                <ul>
                    @foreach($errors->register->all() as $error)
                    <li>{!!$error!!}</li>
                    @endforeach
                </ul>
                    
                </div>
            @endif
        
            {!!Form::open([
                'action' => 'Auth\AuthController@postRegister',
                'role' => 'form'
                ])!!}
                <div class="text-center">
                        <h1><p>O bien regístrese</p></h1> 
                </div>

                <br>
                        <div class="form-group">
                                {!!Form::label('first_name','Nombre')!!} 
                                {!!Form::text('first_name',old('first_name'), ['class' => 'form-control', 'required'])!!}   
                        </div>

                        <div class="form-group">
                                {!!Form::label('last_name','Apellidos')!!} 
                                {!!Form::text('last_name',old('last_name'), ['class' => 'form-control', 'required'])!!}   
                        </div>


                        <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        {!!Form::label('gender','Género')!!} 
                                        {!!Form::select('gender',['M' => 'Masculino','F' => 'Femenino','O' => 'Otro'],null, ['class' => 'form-control'])!!}   
                                     </div>
                                    </div>
                                <div class="col-md-6">   
                                    <div class="form-group">
                                        {!!Form::label('age','Edad')!!} 
                                        {!!Form::number('age',old('age'), ['class' => 'form-control','required'])!!}   
                                     </div>
                                </div>
                        </div>


                        <div class="form-group">
                                {!!Form::label('email','Correo electrónico')!!} 
                                {!!Form::email('email',old('email'), ['class' => 'form-control','required'])!!}   
                        </div>

                         <div class="form-group"> 
                                {!!Form::label('password','Contraseña')!!} 
                                {!!Form::password('password', ['class' => 'form-control','required'])!!}   
                        </div>
                        
                        <div class="form-group">
                                {!!Form::label('password_confirmation')!!} 
                                {!!Form::password('password_confirmation', ['class' => 'form-control'])!!}   
                        </div>
     


                <div class="form-group text-center">
                    {!!Form::submit('Registrar', ['class' => 'btn btn-primary'])!!}
                </div>

            {!!Form::close()!!}
        </div>
    </div> 
</div>



@stop
