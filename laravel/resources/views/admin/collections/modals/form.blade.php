<div id="modal-collection-form" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">

        <div class="container-fluid">
          {!! Form::open(['id' => 'collection-form']) !!}
          {!! Form::hidden('_method') !!}
        
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                {!! Form::label('collection-sku', 'SKU') !!}
                {!! Form::text('sku', null, ['id' => 'collection-sku', 'class' => 'form-control', 'required' => 'required', 'maxlength' => 2]) !!}
                <p id="collection-sku-static" class="form-control-static">
                  
                </p>
              </div>
            </div>

            <div class="col-md-9">
              <div class="form-group">
                {!! Form::label('collection-name', 'Name') !!}
                {!! Form::text('name', null, ['id' => 'collection-name', 'class' => 'form-control', 'required' => 'required', 'maxlength' => 250]) !!}
              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btn-collection-form-submit" class="btn btn-primary">Save</button>
      </div>
    </div>  
  </div>
</div>