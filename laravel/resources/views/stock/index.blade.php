@extends('app')
@section('content')

<div class="container">
	 <center>
        <h1>Libro de videojuegos</h1>
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
                    <a href="#">
                        {!!Html::image("img/welcome/01.jpg", null, ['class' => 'img-responsive'])!!}
                    </a>
                </td>
                <td>
                    Nivel 2<br>
                    <a href="abrir-nivel">
                        {!!Html::image("img/welcome/03.jpg", null, ['class' => 'img-responsive','style' => 'opacity:0.1'])!!}
                    </a>              
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