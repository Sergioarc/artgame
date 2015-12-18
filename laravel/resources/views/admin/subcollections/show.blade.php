@extends('admin.app')

@section('content')


<div class="container">

    <ol class="breadcrumb">
        <li><a href="{{action('Admin\CollectionsController@index')}}">Colecciones</a></li>
        <li class="active">
            {{$collection->name}}
        </li>
        <li class="active">{{$subcollection->name}}</li>
    </ol>
    <div class="page-header">

        <div class="pull-right">
            <a class="btn btn-default" id="btn-add-model"
                data-collection-id="{{$collection->id}}"
                data-subcollection-id="{{$subcollection->id}}"
            >
                <span class="fa fa-fw fa-plus"></span> Añadir un modelo
            </a>
        </div>
        <h1>
            {{$subcollection->name}}
        </h1>
    </div>

    @include('errors.alert', ['errors' => $errors->model_store])
    @include('errors.alert', ['errors' => $errors->model_update])
    @include('errors.alert', ['errors' => $errors->item_store])
    @include('errors.alert', ['errors' => $errors->item_update])

    <?php
    \Log::info('session', Session::all());
    ?>

    @if(($sizes_errors = Session::get('sizes_errors')) and count($sizes_errors) > 0)
    <div class="alert alert-danger">
        No se pudieron guardar {{count($sizes_errors)}} tallas por los siguientes errores:
        @foreach($sizes_errors as $size => $size_errors)
        <strong>{{$size}}</strong>
        <ul>
            @foreach($size_errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endforeach
    </div>
    @endif

    @if(($colors_errors = Session::get('colors_errors')) and count($colors_errors) > 0)
    <div class="alert alert-danger">
        No se pudieron guardar {{count($colors_errors)}} tallas por los siguientes errores:
        @foreach($colors_errors as $color => $color_errors)
        <strong>{{$color}}</strong>
        <ul>
            @foreach($color_errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endforeach
    </div>
    @endif

    <div class="row" id="panels">
        @forelse($models as $model)
        <div class="col-md-3 col-sm-4 col-xs-6 grid-item">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button class="btn btn-xs btn-default btn-edit-model"
                                    data-collection-id="{{$collection->id}}"
                                    data-subcollection-id="{{$subcollection->id}}"
                                    data-model-id="{{$model->id}}"
                                    data-model-sku="{{$model->sku}}">
                                    <span class="fa fa-fw fa-pencil"></span>
                                </button>
                                <button class="btn btn-xs btn-default btn-delete-model"
                                    data-collection-id="{{$collection->id}}"
                                    data-subcollection-id="{{$subcollection->id}}"
                                    data-model-id="{{$model->id}}">
                                    <span class="fa fa-fw fa-trash"></span>
                                </button>
                            </div>
                        </div>
                        <span class="span-model-name">{{ $model->name }}</span>
                    </h3>
                </div>

                <div class="list-group">
                    @forelse($model->modelItems as $item)
                    <a class="list-group-item" href="#">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button class="btn btn-xs btn-default btn-edit-item"
                                    data-collection-id="{{$collection->id}}"
                                    data-subcollection-id="{{$subcollection->id}}"
                                    data-model-id="{{$model->id}}"
                                    data-item-id="{{$item->id}}"
                                    data-item-sku="{{$item->sku}}">
                                    <span class="fa fa-fw fa-pencil"></span>
                                </button>
                                <button class="btn btn-xs btn-default btn-delete-item"
                                    data-collection-id="{{$collection->id}}"
                                    data-subcollection-id="{{$subcollection->id}}"
                                    data-model-id="{{$model->id}}"
                                    data-item-id="{{$item->id}}">
                                    <span class="fa fa-fw fa-trash"></span>
                                </button>
                            </div>
                        </div>
                        <span class="span-item-name">{{$item->name}}</span>
                    </a>
                    @empty
                    <div class="list-group-item">
                        Este modelo no tiene piezas todavía
                    </div>
                    @endforelse
                    <a class="list-group-item item-add-item" href="#"
                        data-collection-id="{{$collection->id}}"
                        data-subcollection-id="{{$subcollection->id}}"
                        data-model-id="{{$model->id}}">
                        <span class="fa fa-fw fa-plus"></span> Añadir pieza
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-xs-12">
            <div class="alert-info alert">
                No hay modelos que mostrar
            </div>
        </div>
        @endforelse
    </div>
</div>

@include('admin.models.modals.form')
@include('admin.models.modals.destroy-confirmation')
@include('admin.model_items.modals.form')
@include('admin.model_items.modals.destroy-confirmation')

@endsection

@section('script')
    {!! Html::script('js/jquery-ui.min.js') !!}
    {!! Html::script('js/hasManyForm.js') !!}
    {!! Html::script('js/panels-layout.js') !!}
    {!! Html::script('js/admin/subcollections/show.js') !!}
@endsection