@extends('layouts.app')

@section('content')
<div class="container">
	@if (Session::has('pesan'))
	<div class="alert blue-clues">
		{{session::get('pesan')}}
	</div>
	@endif

	<div class="row">
		<div class="col-md-8">
			<div class="col-md-12">
				<div class="hide-on-small-only">
					<h3><strong>Buat soal kamu sekarang, cepat dan mudah!</strong></h3>
					<br>
					<a href="#" class="mymodal btn btn-default red" data-target="modal-clues" data-header="Detail Soal" data-body="{{ url('setsoal') }}">Buat Soal</a>
				</div>
				<div class="hide-on-med-and-up">
					<h3><strong>Buat soal kamu sekarang, cepat dan mudah!</strong></h3>
					<p>Untuk performa yang lebih bagus kami menyarankan membuka lewat Komputer/laptop untuk membuat soal</p>
				</div>
			</div>
		</div>
	</div>
	<br><br><br>
	<div class="row">
		@if ($postedquestion->count() == 0)
		<div class="col-md-8">
			<h3>belum ada set soal di posting.</h3>
		</div>
		@elseif($postedquestion->count() > 0)
		<div class="col-md-8">
			@include('partials.questionset_beranda')
		</div>
		@endif
	</div>

</div>
<style>
.card-user{
	padding: 13px 12px 23px;
	border: 1px solid rgba(0,0,0,.15);
	border-radius: 4px;
	margin-bottom: 13px;
}
.card-user .username{
	display: inline-block;
}
.img-content{
	margin-right: 15px;
	display: inline-block;
	overflow: hidden;
	height: 40px;
	width: 40px;
}
</style>
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
						if (true) {}
							$.ajax({
								type: 'GET',
								url: page,
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

		$('.following').click(function(){
			var following_id = $(this).data('id');
			var user_id = '{{ Auth::user()->id }}';
			// console.log($(this).html())
			if ($(this).html() == 'Follow') {
				$(this).html('Unfollow');
			}else if($(this).html() == 'Unfollow'){
				$(this).html('Follow');
			}
			var data = {
				user_id: user_id,
				following_id: following_id,
				_token: '{{ csrf_token() }}'
			}
			$.ajax({
				data: data,
				url: '{{ url('following') }}',
				type: 'POST',
				success: function(){

				},
				beforeSend: function(){
					$('.bar-container').css('visibility', 'visible');
				},
				complete: function(){
					$('.bar-container').css('visibility', 'hidden');
				}
			})
		})
	})
</script>
@endsection
