@extends('app')

@section("content")
	<center>
		<h1>Para abrir un nuevo nivel necesitas:</h1>
		<p style="font-size:20px">*La foto del museo o lugar que visitaste</p>
		<p style="font-size:20px">*Subirla a nuestra pagina</p>
		<hr>
		<p style="font-size:20px">Para subir la foto has click en el boton de abajo.<p>
	</center>
	<row style="margin:40%">

		<center>
			{!!Form::open(['action' => 'LevelsController@store','method' => 'post','files'=> 'true'])!!}
				{!!Form::file("file",["required" => "true"])!!}
				<br>
				{!!Form::submit('Subir foto',['class' => 'btn btn-primary btn-lg'])!!}
			{!!Form::close()!!}
		</center>

	</row>
@endsection