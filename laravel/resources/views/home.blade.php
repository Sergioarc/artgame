@extends('app')

@section('content')
    <center>
        
         <h1>Bienvenido
                        @if(Auth::check()) 
                        {!!Auth::user()->name!!}
                         @endif</h1><br>
        
    </center>

<div class="container">

    <div class="text-center">
        {!! Html::image('img/inicio.jpg', 'Noir', ['class' => 'img-responsive', 'style' => 'display : inline;']) !!}
    </div>
    <center>
        <h1>Difundiendo la cultura</h1><br>
        <h6>Luis Sanguino.<br>
                    Fuente de la vida. 1984<br>
                    Macroplaza. Monterrey, Nuevo León.<br>
                    México.<br>
        </h6>
    </center>
    <hr>

   
</div>



@endsection