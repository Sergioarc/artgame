@extends('app')   
@section('content')
<style>
  #img-home{
    max-width: 100%;
    max-height: 350px;
    vertical-align:middle;
  }
</style>

<div class="row ">

  <div class="col-sm-8  col-sm-offset-2">

    @if($errors->count() > 0)
      <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{!!$error!!}</li>
        @endforeach
      </ul>
        
      </div>
    @endif
  
    {!!Form::open([
      'action' => 'Auth\AuthController@postRegister',
      'role' => 'form'
      ])!!}
      {!! csrf_field() !!}
      <div class="text-center">
          <h1><p>Por favor ingrese sus datos</p></h1> 
      </div>
      <br>

          <div class="form-group">
              {!!Form::label('first_name','Nombre')!!} 
              {!!Form::text('first_name',old('first_name'), ['class' => 'form-control'])!!}   
          </div>

          <div class="form-group">
              {!!Form::label('last_name','Apellidos')!!} 
              {!!Form::text('last_name',old('last_name'), ['class' => 'form-control', 'required'])!!}   
          </div>


          <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                  {!!Form::label('gender','Sexo')!!} 
                  {!!Form::select('gender',['M' => 'Masculino','F' => 'Femenino','O' => 'Otro'],null, ['class' => 'form-control'])!!}   
                 </div>
                </div>
              <div class="col-md-6">   
                <div class="form-group">
                  {!!Form::label('age','Edad')!!} 
                  {!!Form::number('age',old('age'), ['class' => 'form-control', 'required'])!!}   
                 </div>
              </div>
          </div>

          <div class="form-group">
              {!!Form::label('email','Correo electrónico')!!} 
              {!!Form::email('email',old('email'), ['class' => 'form-control'])!!}   
          </div>

           <div class="form-group">
              {!!Form::label('password','Contraseña')!!} 
              {!!Form::password('password', ['class' => 'form-control'])!!}   
          </div>
          
          <div class="form-group">
              {!!Form::label('password_confirmation','Confirmación de contraseña')!!} 
              {!!Form::password('password_confirmation', ['class' => 'form-control'])!!}   
          </div>        

      <div class="form-group text-center">
        {!!Form::submit('Registrar', ['class' => 'btn btn-primary'])!!}
      </div>


    {!!Form::close()!!}
  </div>
</div>
<br>
@stop
