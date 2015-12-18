@extends('app')

@section('content')

<div class="container">
    @if($orders->count() == 0)
    <div class="panel panel-default">
        <div class="panel-body">
            No has realizado ningún pedido todavía
        </div>
    </div>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Referencia del pedido</th>
                <th>Fecha</th>
                <th>Precio total</th>
                <th>Pago</th>
                <th>Estatus</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>
                        {{ $order->formatted_id }}
                    </td>
                    <td>
                        {{ $order->created_at->format('Y-m-d') }}
                    </td>
                    <td>
                        {{ $order->total }}
                    </td>
                    <td>
                            @if($order->status == 'order')
                                <span class="label label-default">Pago aceptado</span>
                            @elseif($order->status == 'in_transit')
                                <span class="label label-info">Enviado</span>
                            @elseif($order->status == 'done')
                                <span class="label label-success">Entregado</span>
                            @elseif($order->status == 'cancelled')
                                <span class="label label-danger">Cancelado</span>
                            @endif
                    </td>
                    <td>
                        <a href="{{action('OrdersController@show', $order->id)}}">
                            Detalles <span class="fa fa-fw fa-chevron-right"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
        {!! $orders->render() !!}
    </div>
    @endif
</div>
@endsection