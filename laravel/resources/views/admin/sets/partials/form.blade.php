<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        {!! Form::model($set, [
            'action' => !$set->exists ? ['Admin\SetsController@store', $collection->id, $subcollection->id] : ['Admin\SetsController@update', $collection->id, $subcollection->id, $model->id],
            'method' => !$set->exists ? 'POST' : 'PUT',
            'files'  => true,
            'class'  => 'form-horizontal',
            'role'   => 'form',
        ]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Descripción', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
            </div>  

            <div class="form-group" id="files-group">
                {!! Form::label('photo', 'Foto(s)', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    <div class="row">
                        @unless(!$set->exists)
                            @foreach($set->photos as $photo)
                                <div class="col-xs-6 col-sm-3">
                                    {!! Html::image($photo->photo('medium')) !!}
                                </div>
                            @endforeach
                        @endunless
                        <div class="col-xs-6 col-sm-4" id="btn-add-file-container">
                            <a class="thumbnail text-center" href="#" id="btn-add-file">
                                <span class="fa fa-plus fa-2x"></span><br>Añadir foto
                            </a>
                        </div>
                    </div> 
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('model_items', 'Piezas', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">

                    <div class="row">
                        <div class="col-xs-4 col-sm-3 set-item-container" id="btn-add-item-container">
                            <a class="thumbnail text-center" id="btn-add-item" href="#"
                            data-toggle="modal" data-target="#modal-add-item">
                                <span class="fa fa-2x fa-plus"></span><br>Añadir pieza
                            </a>        
                        </div>
                    </div>
                    
                </div>  
            </div>
            
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-3">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>


        {!! Form::close() !!}
    </div>
</div>

@section('content')
@parent
@include('admin.sets.partials.add_item')
@endsection

@section('script')
@parent
{!! Html::script('js/admin/sets/form.js')!!}
{!! Html::script('js/admin/sets/add_item.js')!!}
@endsection

@section('style')
@parent
{!! Html::style('css/admin/sets/form.css')!!}
@endsection

