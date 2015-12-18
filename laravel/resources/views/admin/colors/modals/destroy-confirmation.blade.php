<div id="modal-color-destroy-form" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">

        <div class="container-fluid">
          {!! Form::open(['id' => 'color-destroy-form', 'method' => 'DELETE']) !!}
          
          <div class="form-group">
            <p>
              ¿Está seguro que desea eliminar el color <span class="span-color-name"></span>?
            </p>
  
          </div>
          
          {!! Form::close() !!}
        </div>
        

        <div class="text-right">
          <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btn-color-destroy-form-submit" class="btn btn-sm btn-danger">Eliminar</button>
        </div>
        
      </div>
    </div>  
  </div>
</div>