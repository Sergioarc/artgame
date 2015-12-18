@extends('app')
@section('content')

<div class="container">
@if($books->count() > 0)
	<div class="table table-striped">
		<thead>
			<h1>Mis fotografias</h1>
		</thead>
		<tbody>
			@foreach($books as $book)
			<tr>
				<td>
					 {!!Html::image($book->photo->url('medium'), $book->name, ['class' => 'img-rounded'])!!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</div>
@else
	<div class="aler alert-info">
		<center>
		<h1>Ninguna fotografía agregada.</h1>
		</center>
	</div>
@endif
</div>

@endsection