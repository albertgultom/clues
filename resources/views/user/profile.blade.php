@extends('layouts.app')

@section('content')
<div class="container">

	<div class="profile-container">
		<div class="right">
			<h5 class="desc stat">{{Auth::user()->status}}</h5>
			<h5 class="desc school">{!! Auth::user()->school_id == '' ? '<span>Tambahkan Sekolah</span>' : Auth::user()->school_id !!}</h5>
			<a href="{{ url('settings') }}">
				<span class="glyphicon glyphicon-pencil edit" data-toggle="tooltip" data-placement="bottom" title="Edit/Pengaturan"></span>
			</a>
			<a href="{{ url('logout') }}">
				<span class="glyphicon glyphicon-log-out logout" style="margin: 0 10px;" data-toggle="tooltip" data-placement="bottom" title="Keluar"></span>
			</a>
		</div>
		<div class="profile-picture left">
			<img class="responsive-img circle" src="{{ Auth::user()->avatar == '' ? asset('images/default_pic.png') : Auth::user()->avatar }}" alt="">
			<p class="center" style="margin-top: 11px;">{{ Auth::user()->username}}</p>
		</div>
		<div class="description">
			<h1 class="name">{!! Auth::user()->name == '' ? '<span>Tambahkan Nama Anda</span>' : Auth::user()->name !!}</h1>
			<a href="{{ url('followers') }}" class="foll"><span>{{ Auth::user()->followers->count() }}</span> Pengikut</a>
			<a href="{{ url('following') }}" class="foll"><span>{{ Auth::user()->followings->count() }}</span> Diikuti</a>
			<p class="foll"><span>{{ $countpost }}</span> Kiriman Soal</p>
			{{-- <a href="{{ url('follow') }}" class="foll btn btn-default">Follow</a> --}}
			<p class="bio">{!! Auth::user()->biography == '' ? '<span>Tambahkan Bio Anda</span>' : Auth::user()->biography !!}</p>
		</div>
	</div>

	<div class="nav-clues">
		<ul>
			<li><button class="btn btn-default active" data-content="kiriman">Kiriman</button></li>
			<li><button class="btn btn-default" data-content="arsip">Arsip</button></li>
		</ul>

		<div class="nav-tab-content active" id="kiriman">
			@if ($countpost == '0')
			<h2 class="center" style="margin-top: 20px;"><a href="#" class="mymodal" data-target="modal-clues" data-header="Detail Soal" data-body="{{ url('setsoal') }}">Buat Soal Baru!</a></h2>
			@else
			<div class="section row">
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

				<div class="col-md-4">
					<div class="pin" data-url="{{ url('question/'.$a->id.'/create') }}">
						<a href="{{ url('question/'.$a->id.'/delete') }}">
							<span class="glyphicon glyphicon-trash act" data-toggle="tooltip" data-placement="bottom" title="Hapus"></span>
						</a>
						<a href="#" class="mymodal" data-target="modal-clues" data-header="Edit Soal" data-body="{{ url('question/'.$a->id.'/edit') }}">
							<span class="glyphicon glyphicon-pencil act" data-toggle="tooltip" data-placement="bottom" title="Edit"></span>
						</a>
						<h2 class="{{$sign}}"><strong>{{$sign}}</strong></h2>
						<h4 style="margin: 10px 0;" data-toggle="tooltip" data-placement="bottom" title="Nama Soal"><strong>{{$a->name}}</strong></h4>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Pendidikan" class="glyphicon glyphicon-home"></span> : {{$a->level}}</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Mata Pelajaran" class="glyphicon glyphicon-book"></span> : {{$a->study_name}}</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Waktu" class="glyphicon glyphicon-hourglass"></span> : {{$a->time}} Menit</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Jumlah Soal" class="glyphicon glyphicon-folder-open"></span> : {{$a->questions->count()}}</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Dibuat" class="glyphicon glyphicon-record"></span> : {{$a->created_at->diffForHumans()}}</p>
						<div class="divider"></div>
						<div class="right">
							<p style="display: inline-block;"><span class="glyphicon glyphicon-heart"></span> {{$a->likes->count() }} Suka</p> 
							<p style="display: inline-block;"><span class="glyphicon glyphicon-play"></span> {{$a->plays->count() }} Dikerjakan</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			@endif	
		</div>

		<div class="nav-tab-content" id="arsip">
			@if ($countarchive == '0')
			<h2 class="center" style="margin-top: 20px;"><a href="#" class="mymodal" data-target="modal-clues" data-header="Detail Soal" data-body="{{ url('setsoal') }}">Buat Soal Baru!</a></h2>
			@else
			<div class="section row">
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
				<div class="col-md-4">
					<div class="pin" data-url="{{ url('question/'.$a->id.'/create') }}">
						<a href="{{ url('question/'.$a->id.'/delete') }}">
							<span class="glyphicon glyphicon-trash act" data-toggle="tooltip" data-placement="bottom" title="Hapus"></span>
						</a>
						<a href="#" class="mymodal" data-target="modal-clues" data-header="Edit Soal" data-body="{{ url('question/'.$a->id.'/edit') }}">
							<span class="glyphicon glyphicon-pencil act" data-toggle="tooltip" data-placement="bottom" title="Edit"></span>
						</a>
						<h2 class="{{$sign}}"><strong>{{$sign}}</strong></h2>
						<h4 style="margin: 10px 0;" data-toggle="tooltip" data-placement="bottom" title="Nama Soal"><strong>{{$a->name}}</strong></h4>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Pendidikan" class="glyphicon glyphicon-home"></span> : {{$a->level}}</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Mata Pelajaran" class="glyphicon glyphicon-book"></span> : {{$a->study_name}}</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Waktu" class="glyphicon glyphicon-hourglass"></span> : {{$a->time}} Menit</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Jumlah Soal" class="glyphicon glyphicon-folder-open"></span> : {{$a->questions->count()}}</p>
						<p><span data-toggle="tooltip" data-placement="bottom" title="Dibuat" class="glyphicon glyphicon-record"></span> : {{$a->created_at->diffForHumans()}}</p>
						<div class="divider"></div>
						<div class="right">
							<p style="display: inline-block;"><span class="glyphicon glyphicon-heart"></span> {{$a->likes->count() }} Suka</p> 
							<p style="display: inline-block;"><span class="glyphicon glyphicon-play"></span> {{$a->plays->count() }} Dikerjakan</p>
						</div>
					</div>
				</div>
				
				@endforeach
			</div>
			@endif
		</div>

	</div>

	<style>
		.nav-clues ul{
			padding: 10px 0;
			border-bottom: 1px solid #F2F2F2;
			margin-bottom: 20px;
		}
		.nav-clues ul li{
			display: inline-block;
			list-style: none;
		}
		.nav-clues .nav-tab-content{
			display: none;
		}
		.nav-clues .pin .act{
			margin-right: 7px;
			z-index: 10;
		}
		.nav-clues .nav-tab-content.active{
			display: block;
		}
		.nav-clues li button.btn.active:focus{
			outline: none;
		}
	</style>

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
	/*tab content*/
	/*.container {
		background-color: #f2f2f2;
		padding: 10px;
		border: 2px solid #CCCCCC;
		max-width: 900px;
		margin: 0 auto;
		height: 470px;
		display: flex;
		flex-flow: column wrap;  Shorthand – you could use ‘flex-direction: column’ and ‘flex-wrap: wrap’ instead 
		justify-content: flex-start;
		align-items: flex-start;
	}

	.item {
		background-color: orange;
		height: 150px;
		width: 31%;
		margin: 1%;
		padding: 10px;
	}*/


	.nav-tab-content {
		/*display: flex;
		flex-flow: column wrap;  
		flex-direction: column; 
		flex-wrap: wrap;
		justify-content: flex-start;
		align-items: flex-start;*/
		/*position: relative;*/
		/*padding: 10px;*/
		max-width: 100%;
		width: 100%;
		/*max-width: 1100px;*/
		/*min-width: 800px;*/
		margin: 24px 0;
	}

	/*.section{
		-webkit-column-count: 3;
		-webkit-column-gap: 10px;
		-webkit-column-fill: auto;
		-moz-column-count: 3;
		-moz-column-gap: 10px;
		-moz-column-fill: auto;
		column-count: 4;
		column-gap: 15px;
		column-fill: auto;
	}
	@media (min-width: 960px) {
		.section {
			-webkit-column-count: 4;
			-moz-column-count: 4;
			column-count: 4;
		}
	}

	@media (min-width: 1100px) {
		.section {
			-webkit-column-count: 5;
			-moz-column-count: 5;
			column-count: 5;
		}
	}*/

	.section .pin {
		margin-bottom: 33px;
		height: 286px;
		/*-webkit-column-break-inside: avoid;
		-moz-column-break-inside: avoid;
		column-break-inside: avoid;*/
		
		padding: 13px;
		background: white;
		border: 1px solid rgba(0,0,0,.15);
		border-radius: 4px;
		padding: 13px;
	}
	/*.pin h4{
		min-height: 35px;
	}*/
	.pin:hover{
		cursor: pointer;
		box-shadow: 0 6px 12px rgba(0,0,0,.175);
		/*margin-top: -2px;*/
		-webkit-transition: all 0.3s ease-in-out;
		-moz-transition: all 0.3s ease-in-out;
		-o-transition: all 0.3s ease-in-out;
		transition: all 0.3s ease-in-out;

	}
	.pin .act{
		display: none;
		background-color: #fff;
		color: #aaa;
		float: right;
		border-radius: 50%;
		padding: 4px;
		border: 1px solid #aaa;
	}

	.pin img {
		width: 100%;
		border-bottom: 1px solid #ccc;
		padding-bottom: 15px;
		margin-bottom: 5px;
	}

	.SD{
		color: #dd7a78;
	}
	.SMP{
		color: #0E5C9A;
	}
	.SMK{
		color: #A9ABAD;
	}
	.SMK{
		color: #333;
	}
	.Lain-lain{
		color: #E66C69;
	}



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
		height: 150px;
		width: 150px;
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

		// $('#kiriman .section, #arsip .section').pinterest_grid({
		// 	no_columns: 4,
		// 	padding_x: 15,
		// 	padding_y: 15,
		// 	margin_bottom: 50,
		// 	single_column_breakpoint: 700
		// });


		$('.pin').hover(function() {
			$(this).find('.act').css('display', 'block');
		}, function() {
			$(this).find('.act').css('display', 'none');
		});

		$('.pin').click(function(e) {
			// console.log(event.target.className);
			if (e.target.className != 'glyphicon glyphicon-pencil act') {
				var target = $(this).data('url');
				window.location.href = target;
			}
		});
	})
</script>
@endsection