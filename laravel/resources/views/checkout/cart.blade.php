@extends('app')

@section('content')

<div class="container">
	
	@if($errors->add_cart->count() > 0)
	<div class="alert alert-info">
		@foreach($errors->add_cart->keys() as $item_id)
		<p>
			No se pudo agregar la pieza "{{App\ModelItem::find($item_id)->name}}".
			@if(($added = $errors->add_cart->first($item_id)) > 0)
				Solo se pudieron añadir {{$added}} piezas al carrito.
			@endif
		</p>
		@endforeach
	</div>
	@endif

	@if(with($items = Cart::items())->count() == 0)
		<div class="panel panel-default">
			<div class="panel-body">
				Tu carrito aún no tiene artículos.
			</div>
		</div>
	@else
		<div class="order-items">
		    @foreach($items as $item)
	            <div class="media">
	                <div class="media-left">
	                	@if($item->color and ($photo = $item->color->photo))
	                		{!! Html::image($photo->photo->url('medium'), $item->modelItem->name, ['class' => 'media-object']) !!}
	                   	@else
	                   		<img class="media-object" data-src="holder.js/200x300?text=Foto&theme=noir"> 
	                	@endif
	                </div>
	                <div class="media-body dash">
	                    <div class="pull-right">
	                        <a href="#"><span class="fa fa-fw fa-2x fa-times"></span></a>
	                    </div>
	                    <div class="clearfix"></div>
	                    <div class="row">
	                    	<div class="col-sm-4 text-right">
	                    		<h3>
	                    			{{ $item->modelItem->name}}
	                    		</h3>
	                    	</div>
	                    	<div class="col-sm-8">
	                    		<h3>
	                    			<small>
			                    		{{$item->collection->name}}
			                    	</small>
	                    		</h3>
	                    	</div>
	                    </div>
	                    <div class="form-horizontal">
	                    	<div class="form-group">
	                    		<label class="control-label col-sm-4">
	                    			Cantidad
	                    		</label>
	                    		<div class="col-sm-8">
	                    			<p class="form-control-static">
		                    			{{$item->quantity}}
		                    		</p>
	                    		</div>
	                    	</div>
	                    	@if($item->size)
		                    	<div class="form-group">
		                    		<label class="control-label col-sm-4">
		                    			Talla
		                    		</label>
		                    		<div class="col-sm-8">
		                    			<p class="form-control-static">
			                    			{{$item->size->name}}
			                    		</p>
		                    		</div>
		                    	</div>
	                    	@endif
	                    	@if($item->modelItem->colors()->count() > 0)
	                    		<div class="form-group">
		                    		<label class="control-label col-sm-4">
		                    			Color
		                    		</label>
		                    		<div class="col-sm-8">
		                    			<p class="form-control-static">
			                    			{{$item->color ? $item->color->name : 'N/A'}}
			                    		</p>
		                    		</div>
		                    	</div>
	                    	@endif
	                    	
	                    	<div class="form-group">
	                    		<label class="control-label col-sm-4">
	                    			Subtotal
	                    		</label>
	                    		<div class="col-sm-8">
	                    			<p class="form-control-static">
		                    			{{ $item->quantity * $item->modelItem->price }}
		                    		</p>
	                    		</div>
	                    	</div>
	                    </div>
	                </div>
	            </div>

	        @endforeach
	        <div class="media">
            	<div class="media-left">
            		<div class="media-object" style="width: 171px"></div>
            	</div>
            	<div class="media-body">
        		    {!!Form::open([
        		    	'action' => 'CheckoutController@postPaypalPayment',
        		    	'class' => 'form-horizontal'
        			]) !!}
        			<div class="form-group">
        				<label class="control-label col-sm-4">
        					Subtotal
        				</label>
        				<div class="col-sm-8">
        					<p class="form-control-static">
        						{{ Cart::subtotal($items) }}
        					</p>
        				</div>
        			</div>
        			<div class="form-group">
        				<label class="control-label col-sm-4">
        					Envío
        				</label>
        				<div class="col-sm-8">
        					<p class="form-control-static">
        						{{ Cart::shippingAmount($items) }}
        					</p>
        				</div>
        			</div>
        			<div class="form-group">
        				<label class="control-label col-sm-4">
        					Total
        				</label>
        				<div class="col-sm-8">
        					<p class="form-control-static">
        						{{ Cart::total($items) }}
        					</p>
        				</div>
        			</div>
        			<div class="form-group">
        				<div class="col-sm-8 col-sm-offset-4">
        					<button class="btn btn-primary btn-lg" type="submit">
        						<span class="fa fa-fw fa-paypal"></span> Pagar con PayPal
        					</button>
        				</div>
        			</div>
        		    {!! Form::close() !!}	
            	</div>
            </div>
		</div>
	     
	        
	    
	    
	@endif
	
</div>



@endsection

@section('style')
<style type="text/css">
.order-items .media {
	margin-top: 0;
}

@media(min-width: 768px){
	.order-items .media-left {
		padding: 10px 10%;
	}
}

.order-items .media-body {
	padding: 10px;
	background-color: white;
	color: black;
	font-size: 120%;
	position: relative;
	z-index: 1;
}

.order-items .media-body.dash:after {
	content : "";
	position: absolute;
	left    : 10%;
	bottom  : 0;
	height  : 2px;
	width   : 80%;  /* or 100px */
	/*Horizontal*/
	background-image: linear-gradient(to right, gray 60%, rgba(255,255,255,0) 0%);
	background-position: bottom;
	background-size: 14px 1px;
	background-repeat: repeat-x;
}

.order-items .media-body .form-group {
	margin-bottom: 5px;
}

.order-items .media-body .control-label {
	text-transform: uppercase;
}
</style>
@endsection