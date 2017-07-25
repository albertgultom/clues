@foreach ($followings as $a)
<div class="head-follow">
	<div class="avatar-follow follow-list">
		<a href="{{ url('user') }}/{{ $a->following->username}}">
			<img src="{{ $a->following->avatar == '' ? asset('images/default_pic.png') : asset('storage/avatar/'.$a->following->avatar.'') }}" class="responsive-img" alt="">
		</a>
	</div>
	<div class="username-follow follow-list">
		{{$a->following->username}}
	</div>
	<div class="button-follow right">
		@if ($a->following->id != Auth::user()->id)
		@php($count = 0)
		@foreach (Auth::user()->followings as $b)
		@if ($a->following->id == $b->following_id)
		@php($count = 1)
		@endif
		@endforeach
		@if ($count == 1)
		<button data-id="{{$a->following->id}}" class="btn btn-default blue-clues following">Following</button>
		@else
		<button data-id="{{$a->following->id}}" class="btn btn-default blue-clues following">Follow</button>
		@endif
		@endif
	</div>
</div>
@endforeach

<style>
	.follow-list{
		display: inline-block;
	}
	.avatar-follow{
		overflow: hidden;
		border-radius: 50%;
		border: 1px solid #e6e6e6;
		box-shadow: 0 0 5px rgba(0,0,0,.0975);
		height: 40px;
		width: 40px;
		margin: 0 auto;
		margin-right: 20px;
	}
	.username-follow{
		position: relative;
		top: -18px;
	}
</style>

<script>
	$(document).ready(function(){
		$('.following').click(function(){
			var following_id = $(this).data('id');
			var user_id = '{{ Auth::user()->id }}';
			var data = {
				user_id: user_id,
				following_id: following_id,
				_token: '{{ csrf_token() }}'
			}
			if ($(this).html() == 'Following') {
				$(this).html('Follow');
			}else if($(this).html() == 'Follow'){
				$(this).html('Following');
			}

			var username = '{{Auth::user()->username}}';
			if ($('.username').text() == username) {
				if ($(this).html() == 'Follow') {
					var fol = parseInt($('[data-header="Diikuti"] span').html()) - 1;
					$('a[data-header="Diikuti"] span').html(fol);
				}else if($(this).html() == 'Following'){
					var fol = parseInt($('a[data-header="Diikuti"] span').html()) + 1;
					$('a[data-header="Diikuti"] span').html(fol);
				}
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