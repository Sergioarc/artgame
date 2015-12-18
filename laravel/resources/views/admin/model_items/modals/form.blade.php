<div id="modal-item-form" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">

        <div class="container-fluid">
          {!! Form::open(['id' => 'item-form']) !!}
          {!! Form::hidden('_method') !!}
        
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                {!! Form::label('item-sku', 'SKU') !!}
                {!! Form::text('sku', null, ['id' => 'item-sku', 'class' => 'form-control', 'required' => 'required', 'maxlength' => 3, 'placeholder' => '1 letra, 2 dígitos']) !!}
                <p id="item-sku-static" class="form-control-static">
                  
                </p>
              </div>
            </div>

            <div class="col-md-9">
              <div class="form-group">
                {!! Form::label('item-name', 'Name') !!}
                {!! Form::text('name', null, ['id' => 'item-name', 'class' => 'form-control', 'required' => 'required', 'maxlength' => 250]) !!}
              </div>
            </div>
          </div>

          <fieldset>
            

            <div class="form-group" id="color-form-cloneable" style="display:none;">
              <div class="row">
                <div class="col-xs-5 col-sm-4"><input type="number" class="form-control" placeholder="SKU(2 dígitos)" maxlength="2"></div>
                <div class="col-xs-7 col-sm-8">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nombre" maxlength="250">
                    <span class="input-group-btn">
                      <button class="btn btn-danger btn-item-remove" type="button">
                        <span class="fa fa-fw fa-minus"></span>
                      </button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div id="colors">
              <legend>Colores</legend>
            </div>
            <div class="text-right">
              <button type="button" class="btn btn-default btn-sm" id="add-color-btn">
                <span class="fa fa-fw fa-plus"></span> Añadir color
              </button>
            </div>
          </fieldset>

          <fieldset style="margin-top: 10px;">
            

            <div class="form-group" id="size-form-cloneable" style="display:none;">
              <div class="row">
                <div class="col-xs-5 col-sm-4"><input type="number" class="form-control" placeholder="SKU(2 dígitos)" maxlength="2"></div>
                <div class="col-xs-7 col-sm-8">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nombre" maxlength="250">
                    <span class="input-group-btn">
                      <button class="btn btn-danger btn-item-remove" type="button">
                        <span class="fa fa-fw fa-minus"></span>
                      </button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div id="sizes">
              <legend>Tallas</legend>
            </div>

            <div class="text-right">
              <button type="button" class="btn btn-default btn-sm" id="add-size-btn">
                <span class="fa fa-fw fa-plus"></span> Añadir talla
              </button>
            </div>
          </fieldset>
          {!! Form::close() !!}
        </div>
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btn-item-form-submit" class="btn btn-primary">Save</button>
      </div>
    </div>  
  </div>
</div>