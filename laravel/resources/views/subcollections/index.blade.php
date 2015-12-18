@extends('app')

@section('content')



<div class="owl-carousel" id="carousel">
	<div>
		<img data-src="holder.js/200x200?text=Imagen">
		<img data-src="holder.js/200x200?text=Imagen">
		<img data-src="holder.js/200x200?text=Imagen">
		<img data-src="holder.js/200x200?text=Imagen">
	</div>

</div>
@stop


@section('script')
	<script type="text/javascript">
		$(function(){

			$('#carousel').owlCarousel();

		});
	</script>
	

@stop