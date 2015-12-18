@extends('admin.app')

@section('content')

<div class="container">

    <div class="page-header">
        <div class="pull-right">
            <button class="btn btn-default" id="btn-add-collection">
                <span class="fa fa-fw fa-plus"></span> Añadir colección
            </button>
        </div>
        <h1>
            Colecciones
        </h1>
            
    </div>
    <div class="row" id="panels">
        @forelse($collections as $collection)
        <div class="col-md-3 col-sm-4 col-xs-6 grid-item">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button class="btn btn-xs btn-default btn-edit-collection"
                                    data-collection-id="{{$collection->id}}"
                                    data-collection-sku="{{$collection->sku}}">
                                    <span class="fa fa-fw fa-pencil"></span>
                                </button>
                                <button class="btn btn-xs btn-default btn-delete-collection"
                                    data-collection-id="{{$collection->id}}">
                                    <span class="fa fa-fw fa-trash"></span>
                                </button>
                            </div>
                        </div>
                        <span class="span-collection-name">{{ $collection->name }}</span>
                    </h3>
                </div>

                <div class="list-group">
                    @forelse($collection->subcollections as $subcollection)
                    <a class="list-group-item" href="{{action('Admin\SubcollectionsController@show', [$collection, $subcollection])}}">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button class="btn btn-xs btn-default btn-edit-subcollection"
                                    data-collection-id="{{$collection->id}}"
                                    data-subcollection-id="{{$subcollection->id}}"
                                    data-subcollection-sku="{{$subcollection->sku}}">
                                    <span class="fa fa-fw fa-pencil"></span>
                                </button>
                                <button class="btn btn-xs btn-default btn-delete-subcollection"
                                    data-collection-id="{{$collection->id}}"
                                    data-subcollection-id="{{$subcollection->id}}">
                                    <span class="fa fa-fw fa-trash"></span>
                                </button>
                            </div>
                        </div>
                        <span class="span-subcollection-name">{{$subcollection->name}}</span>
                    </a>
                    @empty
                    <div class="list-group-item">
                        Esta colección no tiene subcolecciones todavía
                    </div>
                    @endforelse
                    <a class="list-group-item item-add-subcollection" href="#" 
                        data-collection-id="{{$collection->id}}">
                        <span class="fa fa-fw fa-plus"></span> Añadir subcolección
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-xs-12">
            <div class="alert alert-info">No hay colecciones que mostrar</div>
        </div>
        @endforelse
    </div>

    <div class="text-center">
        {!! $collections->appends(Input::get('search'))->render() !!}
    </div>
</div>  

@include('admin.collections.modals.form')
@include('admin.collections.modals.destroy-confirmation')
@include('admin.subcollections.modals.form')
@include('admin.subcollections.modals.destroy-confirmation')

@endsection


@section('script')
    {!! Html::script('js/panels-layout.js') !!}
    {!! Html::script('js/admin/collections/index.js') !!}
@endsection