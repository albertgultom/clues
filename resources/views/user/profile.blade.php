@extends('layouts.app')

@section('content')
<div class="container">

	<div class="profile-container">
		<div class="right">
			<a href="{{ url('settings') }}">
				<span class="glyphicon glyphicon-pencil edit" data-toggle="tooltip" data-placement="bottom" title="Edit/Pengaturan"></span>
			</a>
			<a href="{{ url('logout') }}">
				<span class="glyphicon glyphicon-log-out logout" style="margin-right: 10px;" data-toggle="tooltip" data-placement="bottom" title="Keluar"></span>
			</a>
		</div>
		<div class="profile-picture left">
			<img class="responsive-img circle" src="{{ Auth::user()->avatar == '' ? asset('images/default_pic.png') : Auth::user()->avatar }}" alt="">
			<p class="center" style="margin-top: 11px;">{{ Auth::user()->username}}</p>
		</div>
		<div class="description">
			<h1 class="name">{!! Auth::user()->name == '' ? '<span>Tambahkan Nama Anda</span>' : Auth::user()->name !!}</h1>
			<a href="{{ url('followers') }}" class="foll"><span>10</span> Pengikut</a>
			<a href="{{ url('following') }}" class="foll"><span>12</span> Diikuti</a>
			<p class="foll"><span>{{ $countpost }}</span> Kiriman Soal</p>
			<h5 class="desc stat">{{Auth::user()->status}}</h5>
			<h5 class="desc school">{!! Auth::user()->school_id == '' ? '<span>Tambahkan Sekolah</span>' : Auth::user()->school_id !!}</h5>
			<p class="bio">{!! Auth::user()->biography == '' ? '<span>Tambahkan Bio Anda</span>' : Auth::user()->biography !!}</p>
		</div>
	</div>

	<div>

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
				<div id="wrapper">
					<div id="columns">

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
				</div>
				@endif				
			</div>
			<div role="tabpanel" class="tab-pane fade" id="archive">
				@if ($countarchive == '0')
				<h2 class="center" style="margin-top: 20px;"><a href="#" class="mymodal" data-target="modal-clues" data-header="Detail Soal" data-body="{{ url('setsoal') }}">Buat Soal Baru!</a></h2>
				@else
				<div id="wrapper">
					<div id="columns">
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
				</div>
				@endif
			</div>
		</div>

	</div>




	
</div>
<style>
	/*tab content*/
	#wrapper {
		width: 100%;
		/*max-width: 1100px;*/
		/*min-width: 800px;*/
		margin: 24px 0;
	}

	#columns {
		-webkit-column-count: 4;
		-webkit-column-gap: 10px;
		-webkit-column-fill: auto;
		-moz-column-count: 4;
		-moz-column-gap: 10px;
		-moz-column-fill: auto;
		column-count: 4;
		column-gap: 15px;
		column-fill: auto;
	}
	@media (max-width: 960px) {
		#columns {
			-webkit-column-count: 3;
			-moz-column-count: 3;
			column-count: 3;
		}
	}

	@media (max-width: 500px) {
		#columns {
			-webkit-column-count: 1;
			-moz-column-count: 1;
			column-count: 1;
		}
	}

	.pin {
		/*display: inline-block;*/
		/*background: #FEFEFE;*/
		/*border: 2px solid #FAFAFA;*/
		border: 1px solid rgba(0,0,0,.15);
		border-radius: 4px;
		/*box-shadow: 0 6px 12px rgba(0,0,0,.175);*/
		margin: 0 2px 15px;
		-webkit-column-break-inside: avoid;
		-moz-column-break-inside: avoid;
		column-break-inside: avoid;
		padding: 15px;
		padding-bottom: 5px;
		background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9);
		opacity: 1;

		-webkit-transition: all .2s ease;
		-moz-transition: all .2s ease;
		-o-transition: all .2s ease;
		transition: all .2s ease;
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
		padding: 7px 10px;
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
	})
</script>
@endsection