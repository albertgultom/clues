@extends('layouts.app')

@section('content')
<div class="container">
	@if (Session::has('pesan'))
	<div class="alert blue-clues">
		{{session::get('pesan')}}
	</div>
	@endif
	
	<div class="row">
		@if ($postedquestion->count() == 0)
		<div class="col-md-8">
			<h3>Follow beberapa user aktif untuk mendapatkan soal terbaru.</h3>
		</div>
		@elseif($postedquestion->count() > 0)
		<div class="col-md-8">
			@include('partials.questionset_beranda')
		</div>
		@endif
		<div class="col-md-4">
			<div class="text-right">
				<h4>Sugesti <span class="red-clues">User</span></h4>
			</div>
			<div class="divider"></div>

			@foreach ($users as $a)
			
			@php($count = 0)
			@foreach (Auth::user()->followings as $b)
			@if ($b->following_id == $a->id)
			@php($count = 1)
			@endif
			@endforeach
			@if (Auth::user()->id == $a->id)
			@php($count = 1)
			@endif

			@if ($count == 0)
			<div class="card-user">
				
				<div class="img-content circle left">
					<img src="{{ $a->avatar == '' ? asset('images/default_pic.png') : asset('storage/avatar/'.$a->avatar.'') }}" class="responsive-img" alt="">
				</div>
				<a class="username red-clues" href="{{ url('user/'.$a->username) }}">{{$a->username}}</a>
				<button data-id="{{$a->id}}" class="btn btn-default blue-clues right following">Follow</button>
			</div>
			@endif
			@endforeach
		</div>
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
