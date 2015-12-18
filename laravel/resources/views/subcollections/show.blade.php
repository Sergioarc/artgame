@extends('app')

@section('content')

	<div class="container">

		{!! Html::collections_menu([], $collection->id) !!}
		<hr>
		
		<div class="row">
			<div class="col-md-6">
				<img data-src="holder.js/100px325?theme=noir&align=left&text={{str_replace(' ', ' \n ', $subcollection->name)}}">
			</div>
			@foreach($sets as $set)
				<div class="col-sm-6 col-md-3">
					<div class="thumbnail text-center">
				      @if($photo = $set->photos->first())
				      	{!!Html::image($photo->photo->url('medium')) !!}
				      @endif
				      <div class="caption">
				        <h4>{{$set->name}}</h4>
						<p>{{$set->description}}</p>
						@if($set->modelItems->filter(function($item){ return $item->stock->count() > 0; })->count() > 0)
							<a href="#" class="btn-add-to-cart" data-set-id="{{$set->id}}">
								<span class="fa fa-fw fa-2x fa-shopping-cart"></span>
							</a>
						@else
							<p class="text-info">
								AGOTADO
							</p>
						@endif
				      </div>
				    </div>
				</div>
			@endforeach
		</div>
	</div>

	<div class="modal fade" id="modal-add-to-cart">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					
					<br>
					

					<div id="template" class="hide">

						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="text-center">
									<img class="product-img img-rounded">
									<h4 class="product-name">Producto</h4>
									<p class="product-description">Descripción</p>
									<hr>
									<div class="form-horizontal item-form">
										<div class="form-group">
											<label class="control-label col-sm-3">
												Cantidad
											</label>
											<div class="col-sm-9 text-left">
												<div class="input-group">
													<input type="number" class="form-control" readonly="readonly" value="1" max="5" name="quantity">
												  	<div class="input-group-btn">
												    	<button type="button" class="btn btn-danger btn-cart-quantity-minus">
												    		<span class="fa fa-fw fa-minus"></span>
												    	</button>
												    	<button type="button" class="btn btn-default btn-cart-quantity-plus">
												    		<span class="fa fa-fw fa-plus"></span>
												    	</button>
												  	</div>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">
												Talla
											</label>
											<div class="col-sm-9">
												<select class="form-control product-sizes" name="size"></select>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">
												Color
											</label>
											<div class="col-sm-9">
												<select class="form-control product-colors" name="color"></select>
											</div>
										</div>

										<div class="form-group">
											<div class="col-sm-9 col-sm-offset-3 text-left">
												<button type="button" class="btn btn-default btn-cart-continue">
													Comprar
												</button>
											</div>
										</div>
									</div>

									<div class="not-available">
										<div class="alert alert-info">
											Lo lamentamos, esta pieza está agotada.
										</div>
										<button type="button" class="btn btn-default btn-cart-continue">
											Continuar
										</button>
									</div>
									
								</div>
							</div>
						</div>
						
					</div>

					<div id="confirm-template" class="hide">
						<div class="text-center">

							<div class="table-responsive text-left">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Pieza</th>
											<th>Color</th>
											<th>Talla</th>
											<th>Cantidad</th>
											<th>Precio unitario</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										
									</tbody>
									<tfoot>
										<tr>
											<th class="text-right" colspan="5">Subtotal</th>
											<td></td>
										</tr>
									</tfoot>
								</table>
							</div>
							
							<button class="btn btn-lg btn-primary btn-confirm">
								<span class="fa fa-2x fa-fw fa-check"></span>
								Confirmar pedido
							</button>
						</div>
					</div>

					<div class="container-fluid" id="model-items-container">
						
					</div>
				</div>

			</div>
		</div>
	</div>	
@endsection


@section('script')
	{!! Html::script('js/laroute.js') !!}
	{!! Html::script('js/cart.js')!!}
@stop