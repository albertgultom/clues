@extends('layouts.app')

@section('content')
<div class="container">

	<div class="profile-container">
		<div class="right">
			{{-- <h5 class="desc stat">{{$user->status}}</h5> --}}
			{{-- <h5 class="desc school">{!! $user->school_id == '' ? '<span>Sekolah belum ditambahkan</span>' : $user->school_id !!}</h5> --}}
		</div>
		<div class="left">
			<div class="profile-picture circle">
				<img class="responsive-img" src="{{ $user->avatar == '' ? asset('images/default_pic.png') : asset('storage/avatar/'.$user->avatar.'') }}" alt="">
			</div>
			<p class="center username" style="margin-top: 11px;">{{ $user->username}}</p>
		</div>
		<div class="description">
			<h1 class="name">{!! $user->name == '' ? '<span>Nama belum ditambahkan</span>' : $user->name !!}</h1>
			<a style="margin-left: 0;" href="#" class="mymodal foll" data-target="modal-clues" data-header="Pengikut" data-body="{{ url('followers/'.$user->id) }}"><span>{{ $user->followers->count() }}</span> Pengikut</a>
			<a hstyle="margin-left: 0;" href="#" class="mymodal foll" data-target="modal-clues" data-header="Diikuti" data-body="{{ url('followings/'.$user->id) }}"><span>{{ $user->followings->count() }}</span> Diikuti</a>
			<p class="foll"><span>{{ $countpost }}</span> Kiriman Soal</p>
			@if (Auth::user()->username != $user->username)
			<button class="foll following btn btn-default">{{ $following == 1 ? 'Following' : 'Follow'}}</button>
			@endif
			<div class="bio">{!! $user->biography !!}</div>
		</div>
		
	</div>

	@if ($postedquestion->count() == '0')
	<h2 class="center" style="margin-top: 20px;">Belum ada postingan dari {{ $user->username}}.</h2>
	@else
	@include('partials.questionset');
	@endif	



	{{-- <div>

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" id="myTabs" role="tablist">
			<li role="presentation" class="active"><a href="#post" aria-controls="post" role="tab" data-toggle="tab">Kiriman</a></li>
			<li role="presentation"><a href="#archive" aria-controls="archive" role="tab" data-toggle="tab">Arsip</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="post">
				@if ($countpost == '0')
				<h2 class="center" style="margin-top: 20px;"><a href="#" class="mymodal" data-target="modal-clues" data-header="Detail Soal" data-body="{{ url('setsoal') }}">Buat Soal Baru!</a></h2>
				@else
				<div class="section">
					@foreach ($questionsets as $a)
					@if (substr($a->level, 0, 3) == 'SD ')
					@php($sign = 'SD')
					@elseif(substr($a->level, 0, 3) == 'SMP')
					@php($sign = 'SMP')
					@elseif(substr($a->level, 0, 3) == 'SMA')
					@php($sign = 'SMA')
					@elseif(substr($a->level, 0, 3) == 'SMK')
					@php($sign = 'SMK')
					@elseif(substr($a->level, 0, 3) == 'Lai')
					@php($sign = 'Lain-lain')
					@endif

					<div class="pin">
						<h2 class="{{$sign}}"><strong>{{$sign}}</strong></h2>
						<h4 style="margin: 10px 0;" data-toggle="tooltip" data-placement="bottom" title="Nama Soal"><strong>{{$a->name}}</strong></h4>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Pendidikan" class="glyphicon glyphicon-home"></span> : {{$a->level}}</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Mata Pelajaran" class="glyphicon glyphicon-book"></span> : {{$a->study_name}}</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Waktu" class="glyphicon glyphicon-dashboard"></span> : {{$a->time}} Menit</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Jumlah Soal" class="glyphicon glyphicon-folder-open"></span> : {{$a->question_amount == '' ? '0' : $a->question_amount}}</p>
					</div>
					@endforeach
				</div>
				@endif				
			</div>
			<div role="tabpanel" class="tab-pane fade" id="archive">
				@if ($countarchive == '0')
				<h2 class="center" style="margin-top: 20px;"><a href="#" class="mymodal" data-target="modal-clues" data-header="Detail Soal" data-body="{{ url('setsoal') }}">Buat Soal Baru!</a></h2>
				@else
				<div class="section">
					@foreach ($archivequestionsets as $a)

					@if (substr($a->level, 0, 3) == 'SD ')
					@php($sign = 'SD')
					@elseif(substr($a->level, 0, 3) == 'SMP')
					@php($sign = 'SMP')
					@elseif(substr($a->level, 0, 3) == 'SMA')
					@php($sign = 'SMA')
					@elseif(substr($a->level, 0, 3) == 'SMK')
					@php($sign = 'SMK')
					@elseif(substr($a->level, 0, 3) == 'Lai')
					@php($sign = 'Lain-lain')
					@endif

					<div class="pin" data-url="{{ url('question/'.$a->id.'/create') }}">
						<a href="{{ url('question/'.$a->id.'/delete') }}">
							<span class="glyphicon glyphicon-trash act" data-toggle="tooltip" data-placement="bottom" title="Hapus"></span>
						</a>
						<a href="{{ url('question/'.$a->id.'/delete') }}">
							<span class="glyphicon glyphicon-trash act" data-toggle="tooltip" data-placement="bottom" title="Hapus"></span>
						</a>
						<h2 class="{{$sign}}"><strong>{{$sign}}</strong></h2>
						<h4 style="margin: 10px 0;" data-toggle="tooltip" data-placement="bottom" title="Nama Soal"><strong>{{$a->name}}</strong></h4>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Pendidikan" class="glyphicon glyphicon-home"></span> : {{$a->level}}</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Mata Pelajaran" class="glyphicon glyphicon-book"></span> : {{$a->study_name}}</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Waktu" class="glyphicon glyphicon-dashboard"></span> : {{$a->time}} Menit</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Jumlah Soal" class="glyphicon glyphicon-folder-open"></span> : {{$a->question_amount == '' ? '0' : $a->question_amount}}</p>
					</div>
					@endforeach
				</div>
				@endif
			</div>
		</div>

	</div> --}}





</div>
<style>
	


	/*profile*/
	.profile-container{
		min-height: 200px;
	}
	.profile-container .foll{
		display: inline-block;
		margin: 0 7px;
		color: #444;
	}
	.profile-container .foll span{
		color: #333;
		font-family: 'Oxygen-Bold', sans-serif;
	}
	.profile-container .edit ,
	.profile-container .logout {
		/*float: right;*/
		background-color: #aaa;
		color: #fff;
		float: right;
		border-radius: 50%;
		height: 30px;
		width: 30px;
		padding: 7px;
		font-size: 14px;
		font-weight: bold;
		border: 1px solid #aaa;
	}
	.profile-container .edit:hover,
	.profile-container .edit:focus,
	.profile-container .logout:hover,
	.profile-container .logout:focus {
		color: #aaa;
		text-decoration: none;
		cursor: pointer;
		background-color: #fff;
		border: 1px solid #aaa;
	}
	.profile-container .name{
		font-family: 'Oxygen-Bold', sans-serif;
	}
	.profile-container .desc{
		margin: 0;
		padding: 6px 12px;
		display: inline-block;
		border-radius: 20px;
		background-color: #f9f9f9;
	}
	.profile-container .desc.stat{
		color: #73a5ce;
		border: 1px solid #73a5ce;
	}
	.profile-container .desc.school{
		color: #dd7a78;
		border: 1px solid #dd7a78;
	}
	.profile-container span{
		color: #E7E7E7;
	}
	.profile-container .description{
		margin-left: 180px;
	}
	.profile-picture{
		overflow: hidden;
		height: 150px;
		width: 150px;
	}
	.bio{
		max-width: 60%;
	}
</style>
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
	})
</script>
@endsection