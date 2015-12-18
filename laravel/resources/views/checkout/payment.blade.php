@extends('app')

@section('content')

<div class="container">
    
    <div class="list-group">
        @foreach([1,2,3,4,5] as $i)
            <div class="list-group-item">
                <div class="media">
                    <div class="media-left">
                       <img class="media-object" data-src="holder.js/200x200?text=Foto&theme=noir"> 
                    </div>
                    <div class="media-body">
                        <div class="pull-right">
                            <a href="#"><span class="fa fa-fw fa-2x fa-times"></span></a>
                        </div>
                        
                        <table class="checkout-table table table-striped">
                            <thead>
                                <tr>
                                    <th><h4 class="media-heading">Producto {{$i}}</h4></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Cantidad</th>
                                    <td>
                                        <a href="#"><span class="fa fa-fw fa-minus-circle"></span></a>
                                            1
                                        <a href="#"><span class="fa fa-fw fa-plus-circle"></span></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Talla</th>
                                    <td>Mediana</td>
                                </tr>
                                <tr>
                                    <th>Color</th>
                                    <td>Rojo</td>
                                </tr>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>$ 100</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach   
        
    </div>
    
    <div class="row">
        <div class="col-sm-5 col-sm-offset-7">
            <table class="checkout-table table">
                <tbody>
                    <tr>
                        <th>Subtotal</th>
                        <td>
                            $ 500
                        </td>
                    </tr>
                    <tr>
                        <th>Envío</th>
                        <td>$ 149</td>
                    </tr>
                    <tr>
                        <th>TOTAL</th>
                        <td>$ 649</td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <a href="{{action('CheckoutController@getPaymentInfo')}}" class="btn btn-lg btn-primary">Confirmar pedido</a>
                        </td>
                    </tr>
                </tbody>
            </table>   
        </div>
    </div>

</div>  
<style type="text/css">
    .table.checkout-table tr th:first-child{
        text-align: right;
        width: 25%;
    }
</style>
@endsection