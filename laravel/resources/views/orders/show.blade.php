@extends('app')

@section('content')

<div class="container">
    <div class="page-header">
        <h2>Detalles del pedido {{$order->formatted_id}}</h2>
    </div>

    <div class="list-group">
        @foreach($items as $item)
            <div class="list-group-item">
                <div class="media">
                    <div class="media-left">
                       <img class="media-object" data-src="holder.js/200x200?text=Foto&theme=noir"> 
                    </div>
                    <div class="media-body">
                        
                        <table class="checkout-table table table-striped">
                            <thead>
                                <tr>
                                    <th><h4 class="media-heading">{{$item->modelItem->name}}</h4></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Cantidad</th>
                                    <td>
                                        {{$item->quantity}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Talla</th>
                                    <td>{{$item->size ? $item->size->name : 'N/A'}}</td>
                                </tr>
                                <tr>
                                    <th>Color</th>
                                    <td>{{$item->color ? $item->color->name : 'N/A'}}</td>
                                </tr>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>{{ $item->quantity * $item->modelItem->price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection