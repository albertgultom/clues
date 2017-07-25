@extends('layouts.app')

@section('content')
<div class="container">
	
	@include('partials.profile_other')

	@if ($postedquestion->count() == '0')
	<h2 class="center" style="margin-top: 20px;">Belum ada postingan dari {{ $user->username}}.</h2>
	@else
	@include('partials.questionset')

	@endif	

</div>
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		$('#myTabs a').click(function (e) {
			e.preventDefault()
			$(this).tab('show')
		})

		$('.nav-clues ul li button').click(function() {
			var content = $(this).data('content');
			var a = $('.nav-clues').find('.nav-tab-content');
			var b = $('.nav-clues').find('ul li button');
			if (a.hasClass('active') == true && b.hasClass('active') == true) {
				a.removeClass('active')
				b.removeClass('active')
				$(this).parents('.nav-clues').find('#'+content).addClass('active');
				$(this).addClass('active');
			}
		});

		$('.following').click(function(){
			var following_id = '{{$user->id}}';
			var user_id = '{{ Auth::user()->id }}';
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
					if ($('.following').html() == 'Follow') {
						$('.following').html('Following');
						var fol = parseInt($('.follower').html()) + 1;
						$('.follower').html(fol);
					}else if($('.following').html() == 'Following'){
						$('.following').html('Follow');
						var fol = parseInt($('.follower').html()) - 1;
						$('.follower').html(fol);
					}
				},
				beforeSend: function(){
					$('.bar-container').css('visibility', 'visible');
				},
				complete: function(){
					$('.bar-container').css('visibility', 'hidden');
				}
			})
		})

		$(window).scroll(fetchPosts);
		function fetchPosts(){
			var page = $('.section').data('nextpage');
			if (page != null) {
				clearTimeout($.data(this, "scrollCheck"));
				$.data(this, "scrollCheck", setTimeout(function(){
					var scroll_position_load = $(window).height() + $(window).scrollTop() + 50;
					if (scroll_position_load >= $(document).height()) {
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

	})
</script>
@endsection