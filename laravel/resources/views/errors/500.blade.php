@extends('app')

@section('content')

<div class="container">
    <h2>Ocurrió un error interno en el servidor.</h2>
    @if('app.debug')
    <hr>
    <h3>{{get_class($exception)}}</h3>
    <h4>{{$exception->getMessage()}}</h4>
    <ol style="font-">
        @foreach($exception->getTrace() as $trace)
            <li>
                <samp>
                {{@$trace['file'] ? str_replace(base_path(), '', $trace['file']) : ''}}

                @if(@$trace['line'])
                    <strong class="text-primary">: {{ $trace['line'] }}</strong>
                @elseif(@$trace['function'])
                    <strong class="text-info">{{@$trace['class']}}</strong> <span class="fa fa-fw fa-arrow-right"></span>
                    {{ $trace['function'] }}
                @else
                    {{ join(' || ', $trace) }}
                @endif
                </samp>
                
            </li>
        @endforeach
    </ol>
    @endif
</div>

@endsection