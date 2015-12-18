@extends('admin.app')

@section('content')

@if(isset($error))
	<div class="alert alert-danger">
		{!!$error!!}	
	</div>
	
@endif
@if(isset($success))
	<div class="alert alert-success">
		{!!$success!!}	
	</div>
@endif

@if($orders->count() > 0)

	<div class="row">
	
	{!!Form::open(['action' => 'Admin\OrdersController@index','method' => 'GET' ])!!}
		<div class="col col-md-5">
		{!!Form::label('order_id','Número de orden')!!}
		{!!Form::number('order_id',null,['class' => 'form-control','placeholder' => 'Filtro por número de orden'])!!}				
		</div>
		<div class="col col-md-5">
			{!!Form::label('status','Estado')!!}
			{!!Form::select('status',[null => 'Todos'] + $status,null,['class' => 'form-control'])!!}
		</div>
		
		<div class="col col-md-2">
		<br>
			{!!Form::submit('Filtrar',['class' => 'btn btn-primary'])!!}
		</div>
		
	{!!Form::close()!!}	
	</div>
	<hr>
	<div class="row  col-md-12">
		<table class="table table-striped">
			<thead>
				<th>
					# ORDEN
				</th>
				<th>
					ESTATUS 
				</th>
				<th>
					
				</th>
			</thead>		
			<tbody>
				
				@foreach($orders as $order)
					<tr>
						<td>
							{!!$order->id!!}
						</td>
						<td>
							{!!$order->estado!!}
						</td>	
						<td>
							@if($order->status != 'cancelled')
							{!!Form::open(['action' => ['Admin\OrdersController@update', $order->id],'method' => 'PUT'])!!}
	 							{!!Form::submit('Actualizar estado', ['class' => 'btn btn-sm btn-default'])!!}
	 						{!!Form::close()!!}
	 						@endif
						</td>
					</tr>
				@endforeach
				
			</tbody>
		</table>		
	</div>

1
@else
	<div class="alert alert-info">
			No se han encontrado ordenes
	</div>

@endif

@stop

@section('script')
	<script type="text/javascript">
	$(function(){
		$('.status-change').each(function(){
			$.ajax([

				])
		});
	});

	</script>
@stop