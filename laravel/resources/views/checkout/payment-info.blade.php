@extends('app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            {!! Form::open([
                'class' => 'form-horizontal',
                'action' => 'CheckoutController@postPayment',
            ]) !!}
                <div class="form-group">
                    {!! Form::label('holders_name', 'Nombre del titular', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('holders_name', null, ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('holders_name') }}</small>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('card_number', 'Número de tarjeta', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-5">
                        {!!Form::text('card_number', null, ['class' => 'form-control', 'pattern' => '[0-9]{13,16}']) !!}
                    </div>
                    {!! Form::label('card_cv', 'Código de verificación', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-2">
                        {!!Form::text('card_cvv', null, ['class' => 'form-control', 'pattern' => '[0-9]{3,4}']) !!}
                    </div>
                </div>

                <div class="form-group">
                {!! Form::label('card_expiration', 'Fecha de vencimiento', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-xs-9">
                    <div class="row">
                        <div class="col-xs-6">
                            {!!Form::selectMonth('month',1, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-xs-6">
                            {!!Form::selectYear('year',$date->year,$date->addYears(6)->year,null,['class' => 'form-control'])!!}
                        </div>                        
                    </div>

                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('card_kind', 'Tipo de tarjeta', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            {!! Form::radio('card_kind', 'mastercard', 1) !!}
                            <span class="fa fa-fw fa-2x fa-cc-mastercard"></span>
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('card_kind', 'visa', false) !!}
                            <span class="fa fa-fw fa-2x fa-cc-visa"></span>
                        </label>
                        <label class="radio-inline">
                            {!! Form::radio('card_kind', 'amex', false) !!}
                            <span class="fa fa-fw fa-2x fa-cc-amex"></span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button class="btn btn-primary btn-lg">
                            <span class="fa fa-fw fa-paypal"></span> Paga con PayPal
                        </button>
                        {!!Form::submit('Pagar con tarjeta', ['class' => 'btn btn-primary btn-lg']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    
</div>
@endsection