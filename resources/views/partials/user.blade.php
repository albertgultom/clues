<div class="users-content">
	@foreach ($users as $a)
	@if ($a->id != Auth::user()->id)
	<div class="card center">
		<div class="avatar-card">
			<a href="{{ url('user') }}/{{ $a->username}}">
				<img src="{{ $a->avatar == '' ? asset('images/default_pic.png') : asset('storage/avatar/'.$a->avatar.'') }}" class="responsive-img" alt="">
			</a>
		</div>
		<div>
			<br>
			{{ $a->username }}
		</div>
		<div>
			<br>
			@php($count = 0)
			@foreach (Auth::user()->followings as $b)
			@if ($a->id == $b->following_id)
			@php($count = 1)
			@endif
			@endforeach
			@if ($count == 1)
			<button data-id="{{$a->id}}" class="btn btn-default blue-clues following">Unfollow</button>
			@else
			<button data-id="{{$a->id}}" class="btn btn-default blue-clues following">Follow</button>
			@endif
		</div>
	</div>
	@endif
	@endforeach
</div>
<style>
	.users-content{
		width: 100%;
		overflow-y: scroll;
	}
	.users-content .card{
		width: 130px;
		margin-bottom: 10px;
		background: white;
		border: 1px solid rgba(0,0,0,.15);
		border-radius: 4px;
		padding: 13px;
		display: inline-block;
		margin-right: 15px;
	}
	.users-content .avatar-card{
		overflow: hidden;
		border-radius: 50%;
		border: 1px solid #e6e6e6;
		box-shadow: 0 0 5px rgba(0,0,0,.0975);
		height: 40px;
		width: 40px;
		margin: 0 auto;
	}
</style>
<script>
	$(document).ready(function(){
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