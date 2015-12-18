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
            {{$model->name}}
        </li>
    </ol>

    <div class="row">

        @foreach($model_items as $item)

        <input type="hidden" id = "item" data-item ="{{$item->id}}">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        {{$item->name}}
                    </h4>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Colores</th>
                            <th>Tallas</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @while(!is_null($color = $item->colors->shift()) | !is_null($size = $item->sizes->shift()))
                            <tr>
                                <td>
                                    @if($color)
                                        <span class="span-color-name">{{$color->name}}</span>
                                        <div class="pull-right">
                                            <div class="btn-group">
                                                <button class="btn btn-default btn-xs btn-edit-color"
                                                    data-collection-id="{{$collection->id}}"
                                                    data-subcollection-id="{{$subcollection->id}}"
                                                    data-model-id="{{$model->id}}"
                                                    data-item-id="{{$item->id}}"
                                                    data-color-id="{{$color->id}}"
                                                    data-photo-src="{{$color->photo ? $color->photo->photo->url('medium') : ''}}"
                                                    data-color-sku="{{$color->sku}}"
                                                >
                                                    <span class="fa fa-fw fa-edit"></span>
                                                </button>
                                                <button class="btn btn-default btn-xs btn-delete-color"
                                                    data-collection-id="{{$collection->id}}"
                                                    data-subcollection-id="{{$subcollection->id}}"
                                                    data-model-id="{{$model->id}}"
                                                    data-item-id="{{$item->id}}"
                                                    data-color-id="{{$color->id}}"
                                                >
                                                    <span class="fa fa-fw fa-trash"></span>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if($size)
                                        <span class="span-size-name">{{$size->name}}</span>
                                        <div class="pull-right">
                                                <div class="btn-group">
                                                    <button class="btn btn-default btn-xs btn-edit-size"
                                                    data-collection-id="{{$collection->id}}"
                                                    data-subcollection-id="{{$subcollection->id}}"
                                                    data-model-id="{{$model->id}}"
                                                    data-item-id="{{$item->id}}"
                                                    data-size-id="{{$size->id}}"
                                                    data-size-sku="{{$size->sku}}">
                                                        <span class="fa fa-fw fa-edit"></span>
                                                    </button>
                                                    <button class="btn btn-default btn-xs">
                                                        <span class="fa fa-fw fa-trash"></span>
                                                    </button>
                                                </div>
                                            </div>
                                    @endif
                                </td>
                            </tr>
                        @endwhile
                        <tr>
                            <td>
                                <button class="btn btn-default btn-block btn-add-color"
                                data-collection-id="{{$collection->id}}"
                                data-subcollection-id="{{$subcollection->id}}"
                                data-model-id="{{$model->id}}"
                                data-item-id="{{$item->id}}">

                                    Agregar color

                                </button>
                                
                            </td>
                            <td>
                                <button class="btn btn-default btn-block btn-add-size"
                                data-collection-id="{{$collection->id}}"
                                data-subcollection-id="{{$subcollection->id}}"
                                data-model-id="{{$model->id}}"
                                data-item-id="{{$item->id}}">
                                    Agregar talla
                                </button>
                                
                            </td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
        </div>

        @endforeach
    </div>
</div>

@include('admin.colors.modals.form')
@include('admin.colors.modals.destroy-confirmation')
@include('admin.sizes.modals.form')
@endsection

@section('script')
{!! Html::script('js/admin/colors/form.js') !!}
{!! Html::script('js/admin/colors/destroy.js') !!}
{!! Html::script('js/admin/sizes/form.js') !!}
@endsection


