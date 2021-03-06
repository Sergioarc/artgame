@extends('app')
@section('content')

<div class="container">
	 <center>
        <h1>Pasaporte del arte</h1>
    <center>
     <p style="font-size:30px">Para abrir un nuevo juego da click sobre la imagen del nivel.</p>
                   
    
    <table class="table table-striped" boder="1" style="margin:5%">
        <thead>
            <th>
               <p style="font-size:30px;">Niveles</p> 
            </th>
            <th></th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <tr>
                <td>
                    Nivel 1<br>
                    <a href="Ecoambient.html" target="_blank">
                        {!!Html::image("img/welcome/01.jpg", null, ['class' => 'img-responsive'])!!}
                    </a>
                </td>
                <td>
                    Nivel 2<br>
                    @if(\Auth::user()->level_unblocked == 0)
                    <a href="{{action('LevelsController@create')}}">
                        {!!Html::image("img/welcome/03.jpg", null, ['class' => 'img-responsive','style' => 'opacity:0.1'])!!}
                    </a>              
                    @else
                    <a href="Arquileza.html" target="_blank">
                        {!!Html::image("img/welcome/03.jpg", null, ['class' => 'img-responsive'])!!}
                    </a>
                    @endif

                </td>
                <td>
                    Nivel 3<br>
                    {!!Html::image("img/welcome/02.jpg", null, ['class' => 'img-responsive','style' => 'opacity:0.1'])!!}
                </td>
                <td>
                    Nivel 4<br>
                    {!!Html::image("img/welcome/04.jpg", null, ['class' => 'img-responsive','style' => 'opacity:0.1'])!!}
                </td>
            </tr>
            <tr>
                <td>
                    Nivel 5<br>
                    {!!Html::image("img/welcome/01.jpg", null, ['class' => 'img-responsive','style' => 'opacity:0.1'])!!}
                </td>
                <td>
                    Nivel 6<br>
                    {!!Html::image("img/welcome/05.jpg", null, ['class' => 'img-responsive','style' => 'opacity:0.1'])!!}
                </td>
                <td>
                    Nivel 7<br>
                    {!!Html::image("img/welcome/06.jpg", null, ['class' => 'img-responsive','style' => 'opacity:0.1'])!!}
                </td>
                <td>
                    Nivel 8<br>
                    {!!Html::image("img/welcome/07.jpg", null, ['class' => 'img-responsive','style' => 'opacity:0.1'])!!}
                </td>
            </tr>

        </tbody>
    </table>
</div>

@endsection