@extends('admin.app')

@section('content')

<div class="container-fluid">
    <div class="text-right">
        <button class="btn btn-default" data-toggle="modal" data-target="#modal-stock-create">Añadir artículos al inventario</button>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Colección</th>
                    <th>Subcolección</th>
                    <th>Modelo</th>
                    <th>Pieza</th>
                    <th>Color</th>
                    <th>Talla</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stock as $item)
                    <tr class="{{$item->in_stock < 5 ? 'danger' : ($item->in_stock < 10 ? 'warning' : '')}}">
                        <td>{{$item->collection->name}}</td>
                        <td>{{$item->subcollection->name}}</td>
                        <td>{{$item->model->name}}</td>
                        <td>{{$item->modelItem->name}}</td>
                        <td>{{$item->color ? $item->color->name : 'N/A'}}</td>
                        <td>{{$item->size ? $item->size->name : 'N/A'}}</td>
                        <td>{{$item->in_stock}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@include('admin.stock.partials.create')

@endsection

@section('script')
{!! Html::script('js/laroute.js') !!}
{!! Html::script('js/admin/stock/create.js') !!}
@endsection