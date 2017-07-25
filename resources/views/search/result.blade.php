@extends('layouts.app')

@section('content')
<div class="container">
	<div class="container">
		@if ($keyword != '')
		<h3 class="center">Hasil pencarian "{{ $keyword }}"</h3>
		<br>
		@endif
		@if ($users->count() == '' && $postedquestion->count() == '' && $keyword != '')
		<div class="divider"></div>
		<p class="center">Pencarian dengan kata kunci "{{$keyword}}" tidak ditemukan.</p>
		@endif

		@if ($users->count() > 0)
		<div class="row">
			@include('partials.user')
		</div>
		<br>
		@endif
		@if ($postedquestion->count() > 0)
		<div class="row">
			@include('partials.questionset')
		</div>
		@endif
	</div>
</div>
<script>
	$(document).ready(function(){
		$(window).scroll(fetchPosts);
		function fetchPosts(){
			var page = $('.section').data('nextpage');
			if (page != null) {
				clearTimeout($.data(this, "scrollCheck"));
				$.data(this, "scrollCheck", setTimeout(function(){
					var scroll_position_load = $(window).height() + $(window).scrollTop() + 50;
					if (scroll_position_load >= $(document).height()) {
						var key = '{{$keyword}}';
						if (true) {}
							$.ajax({
								type: 'GET',
								url: page+'&keyword={{$keyword}}',
								success: function(data){
									$('.section').append(data.post);
									$('.section').data('nextpage', data.requestpage);
								},
								beforeSend: function(){
									$('.bar-container').css('visibility', 'visible');
								},
								complete: function(){
									$('.bar-container').css('visibility', 'hidden');
								}
							})
					}
				}, 550));
			}
		}
	})
</script>

@endsection