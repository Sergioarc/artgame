@extends('admin.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-4">
            <a class="btn btn-default btn-lg btn-block"
                href="{{action('Admin\CollectionsController@index')}}">
                <span class="fa fa-fw fa-2x fa-database"></span><br>
                Colecciones
            </a>
        </div>
    </div>
</div>

@endsection