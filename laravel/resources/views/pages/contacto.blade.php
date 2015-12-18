@extends('app')

@section('content')

<div class="container">

	<h2>Servicio al cliente</h2>

	<hr>

	<p>Estamos comprometidos con crear experiencias exquisitas para todos y cada uno de los visitants de Noir.</p>
	<p>Si tienes preguntas, comentarios o ideas inspiradoras, te pedimos que te pongas en contacto con alguno 
		de nuestros especialistas en línea o con nuestros respresentantes.</p>
	<p>Puedes enviarnos un correo directamente a <a href="mailto:info@noirmx.mx">info@noirmx.mx</a> o con el siguiente formulario.</p>

	<br>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			{!! Form::open([
				'method' => 'GET',
				'class'  => 'form-horizontal'
			]) !!}

			<div class="form-group">

				{!! Form::label('name', '¿Cuál es tu nombre?') !!}
				{!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
			
			</div>

			<div class="form-group">
				{!! Form::label('email', '¿Cuál es tu correo electrónico?*') !!}
				{!! Form::text('email', null, ['class' => 'form-control', 'required' => true]) !!}
			
			</div>
			
			<div class="form-group">
				{!! Form::label('phone', '¿Cuál es tu teléfono?') !!}
				{!! Form::text('phone', null, ['class' => 'form-control']) !!}
			
			</div>

			<div class="form-group">
				{!! Form::label('comment', '¿Cuál es tu comentario?') !!}
				{!! Form::textarea('comment', null, ['class' => 'form-control', 'required' => true, 'rows' => 3]) !!}
			</div>   

			<div class="form-group text-center">
				<button class="btn btn-lg btn-primary" type="submit">Enviar</button>
			</div>
			{!! Form::close() !!} 
		</div>
	</div>
	             

</div>

@endsection