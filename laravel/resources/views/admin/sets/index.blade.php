@extends('admin.app')

@section('content')

<div class="container">
    <ol class="breadcrumb">
        <li>
            <a href="{{action('Admin\CollectionsController@index')}}">
                Colecciones
            </a>
        </li>
        <li>
            <a href="{{action('Admin\CollectionsController@show', $collection->id)}}">
                {{$collection->name}}
            </a>
        </li>
        <li>
            <a href="{{action('Admin\SubcollectionsController@show', [$collection->id, $subcollection->id])}}">
                {{$subcollection->name}}
            </a>
        </li>
        <li class="active">
            Conjuntos
        </li>
    </ol>

    <div class="text-right">
        <a class="btn btn-default" href="{{action('Admin\SetsController@create', [$collection->id, $subcollection->id])}}">
            <span class="fa fa-fw fa-plus"></span> Añadir un conjunto
        </a>
    </div>
    <div class="row" id="panels">
        @forelse($sets as $set)
            <div class="col-md-4 col-xs-6 grid-item">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button class="btn btn-xs btn-default btn-edit-set"
                                        data-collection-id="{{$collection->id}}"
                                        data-subcollection-id="{{$subcollection->id}}">
                                        <span class="fa fa-fw fa-pencil"></span>
                                    </button>
                                    <button class="btn btn-xs btn-default btn-delete-set"
                                        data-collection-id="{{$collection->id}}"
                                        data-subcollection-id="{{$subcollection->id}}">
                                        <span class="fa fa-fw fa-trash"></span>
                                    </button>
                                </div>
                            </div>
                            <span class="span-set-name">{{ $set->name }}</span>
                        </h3>
                    </div>

                    <table class="table table-striped">

                        <tr class="text-center">
                           <td width="200px" rowspan="{{max(1, $set->photos->count() + 1)}}">
                            @foreach($set->photos as $photo)
                                {!! Html::image($photo->photo->url('medium')) !!}
                            @endforeach 
                           </td> 
                        </tr>
                        @foreach($set->modelItems as $item)
                            <tr>
                                @forelse($set->modelItems as $item)
                                <td>
                                    <span class="span-item-name">{{$item->name}}</span>
                                </td>
                                @empty
                                <td>
                                    Este conjunto no tiene piezas
                                </td>
                                @endforelse
                            </tr>
                        @endforeach
                        
                    </table>
                    
                </div>
            </div>
        @empty
            <div class="col-xs-12">
                <div class="alert-info alert">
                    No hay conjuntos que mostrar
                </div>
            </div>
        @endforelse
    </div>
    
</div>
@endsection