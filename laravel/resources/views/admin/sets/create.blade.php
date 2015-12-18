@extends('admin.app')

@section('content')
    <div class="container">
        @include('admin.sets.partials.form', ['set' => new App\Set])
    </div>
@endsection