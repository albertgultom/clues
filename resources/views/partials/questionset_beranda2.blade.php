<link rel="stylesheet" href="{{ url('css/modal-clues.css') }}">
<script src="{{ asset('js/modal-clues.js') }}"></script>

@foreach ($postedquestion as $a)
<div class="">
	<div class="pin" data-url="{{ url('question/'.$a->id.'/create') }}">
		<div class="headerpin left">
			<div class="avatar-pin circle">
				<a href="{{ url('user') }}/{{ $a->user->username}}">
					<img src="{{ $a->user->avatar == '' ? asset('images/default_pic.png') : asset('storage/avatar/'.$a->user->avatar.'') }}" class="responsive-img" alt="">
				</a>
			</div>
			<div class="username-pin">
				<a href="{{ url('user') }}/{{ $a->user->username}}">{{$a->user->username}}</a>
				<br>
				{{$a->created_at->diffForHumans()}}
			</div>
		</div>
		@if (Auth::user()->id == $a->user_id)
		<div class="right">
			<a href="{{ url('question/'.$a->id.'/delete') }}">
				<span class="glyphicon glyphicon-trash act" data-toggle="tooltip" data-placement="bottom" title="Hapus"></span>
			</a>
			<a href="#" class="mymodal" data-target="modal-clues" data-header="Edit Soal" data-body="{{ url('setsoal/'.$a->id) }}">
				<span class="glyphicon glyphicon-pencil act" data-toggle="tooltip" data-placement="bottom" title="Edit"></span>
			</a>
		</div>
		@endif
		<div class="divider" style="margin: 50px 0 15px 0;"></div>
		{{-- <h2 class="{{$sign}}"><strong>{{$sign}}</strong></h2> --}}
		<h4 class="judulsoal" style="margin: 10px 0;"><strong>{{$a->name}}</strong></h4>
		<p><span data-toggle="tooltip" data-placement="bottom" title="Tag" class="glyphicon glyphicon-tag"></span> : {{$a->study_name}}</p>
		<p><span data-toggle="tooltip" data-placement="bottom" title="Waktu" class="glyphicon glyphicon-hourglass"></span> : {{$a->time}} Menit</p>
		<p><span data-toggle="tooltip" data-placement="bottom" title="Jumlah Soal" class="glyphicon glyphicon-folder-open"></span> : {{$a->questions->count()}} Butir soal</p>
		@if ($a->token != '' && Auth::user()->id == $a->user_id)
		<p class="red-clues"><span data-toggle="tooltip" data-placement="bottom" title="Token" class="glyphicon glyphicon-lock red-clues"></span> : {{$a->token}}</p>
		@elseif($a->token != '' && Auth::user()->id != $a->user_id)
		<p class="red-clues"><span data-toggle="tooltip" data-placement="bottom" title="Token" class="glyphicon glyphicon-lock red-clues"></span> : Membutuhkan token</p>
		@endif
		<div class="divider"></div>
		@if (Auth::user()->username != $a->user->username)
		@if ($a->token != '')
		<a href="#" class="mymodal" data-target="modal-clues" data-header="Masukan Token" data-body="{{ url('inputToken/'.$a->id) }}">
			<strong>Kerjakan</strong>
		</a>
		@else
		<a class="red-clues" href="{{ url('question/'.$a->id.'/play') }}">
			<strong>Kerjakan</strong>
		</a>
		@endif
		@endif
		@if (Auth::user()->username == $a->user->username && $a->token != '')
		<a class="red-clues" href="{{ url('question/'.$a->id.'/result') }}">
			<strong>Lihat Hasil</strong>
		</a>
		@endif
		<div class="right">
			<p style="display: inline-block;"><span class="glyphicon glyphicon-heart"></span> {{$a->likes->count() }} Suka</p>
			<p style="display: inline-block;"><span class="glyphicon glyphicon-play"></span> {{$a->plays->count() }} Dikerjakan</p>
		</div>
	</div>
</div>
@endforeach

<style>

	.section .pin .right p{
		margin: 0;
	}
	.headerpin .avatar-pin,
	.headerpin .username-pin{
		display: inline-block;

	}
	.headerpin .username-pin{
		position: relative;
	}

	.headerpin .avatar-pin{
		margin: 0 10px 0 0;
		height: 34px;
		width: 34px;
		overflow: hidden;
		border: 1px solid #e6e6e6;
		box-shadow: 0 0 5px rgba(0,0,0,.0975);
		position: relative;
	}


	/*.section {
		-webkit-column-count: 3;
		-webkit-column-gap: 10px;
		-webkit-column-fill: auto;
		-moz-column-count: 3;
		-moz-column-gap: 10px;
		-moz-column-fill: auto;
		column-count: 3;
		column-gap: 25px;
		column-fill: auto;
	}*/

	.section .pin {
		width: 100%;
		margin: 0 2px 15px;
		background: white;
		display: inline-block;
		border: 1px solid rgba(0,0,0,.15);
		border-radius: 4px;
		-webkit-column-break-inside: avoid;
		-moz-column-break-inside: avoid;
		column-break-inside: avoid;
		padding: 13px;
		opacity: 1;

		-webkit-transition: all .2s ease;
		-moz-transition: all .2s ease;
		-o-transition: all .2s ease;
		transition: all .2s ease;
	}

	/*.pin:hover{
		box-shadow: 0 6px 12px rgba(0,0,0,.175);
		-webkit-transition: all 0.3s ease-in-out;
		-moz-transition: all 0.3s ease-in-out;
		-o-transition: all 0.3s ease-in-out;
		transition: all 0.3s ease-in-out;

	}*/
	.pin .act{
		display: none;
		margin-right: 7px;
		z-index: 10;
		background-color: #fff;
		color: #dd7a78;
		float: left;
		padding-right: 5px;
	}

	.pin img {
		width: 100%;
		border-bottom: 1px solid #ccc;
		padding-bottom: 15px;
		margin-bottom: 5px;
	}

	.pin .judulsoal:hover{
		cursor: pointer;
		z-index: 11;
	}

</style>
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();

		$('.pin').hover(function() {
			$(this).find('.act').css('display', 'block');
		}, function() {
			$(this).find('.act').css('display', 'none');
		});

		$('.pin .judulsoal').click(function(e) {
			if (e.target.className != 'glyphicon glyphicon-pencil act') {
				var target = $(this).parents('.pin').data('url');
				window.location.href = target;
			}
		});

	})
</script>