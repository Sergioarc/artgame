<div id="modal-size-form" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">

				<div class="container-fluid">
					{!! Form::open(['id' => 'size-form']) !!}
					{!! Form::hidden('_method') !!}
				
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								{!! Form::label('size-sku', 'SKU') !!}
								{!! Form::text('sku', null, ['id' => 'size-sku', 'class' => 'form-control', 'required' => 'required', 'maxlength' => 2]) !!}
								<p id="size-sku-static" class="form-control-static">
									
								</p>
							</div>
						</div>

						<div class="col-md-9">
							<div class="form-group">
								{!! Form::label('size-name', 'Name') !!}
								{!! Form::text('name', null, ['id' => 'size-name', 'class' => 'form-control', 'required' => 'required', 'maxlength' => 250]) !!}
							</div>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
				
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" id="btn-size-form-submit" class="btn btn-primary">Save</button>
			</div>
		</div>  
	</div>
</div>