<div class="section row">
	@foreach ($postedquestion as $a)
	@if ($a->level == 'Umum')
	@php($sign = 'Umum')
	@elseif($a->level == 'Sekolah')
	@php($sign = 'Sekolah')
	@elseif($a->level == 'Universitas')
	@php($sign = 'Universitas')
	@elseif($a->level == 'Perusahaan')
	@php($sign = 'Perusahaan')
	@endif

	<div class="col-md-4">
		<div class="pin" data-url="{{ url('question/'.$a->id.'/create') }}">
			<div class="headerpin">
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
			<div class="divider"></div>
			<h2 class="{{$sign}}"><strong>{{$sign}}</strong></h2>
			<h4 style="margin: 10px 0;"><strong>{{$a->name}}</strong></h4>
			<p><span data-toggle="tooltip" data-placement="bottom" title="Tag" class="glyphicon glyphicon-tag"></span> : {{$a->study_name}}</p>
			<p><span data-toggle="tooltip" data-placement="bottom" title="Waktu" class="glyphicon glyphicon-hourglass"></span> : {{$a->time}} Menit</p>
			<p><span data-toggle="tooltip" data-placement="bottom" title="Jumlah Soal" class="glyphicon glyphicon-folder-open"></span> : {{$a->questions->count()}} Butir soal</p>
			<div class="divider"></div>
			@if (Auth::user()->username != $a->user->username)
			<a class="act" href="{{ url('question/'.$a->id.'/play') }}">
				<strong>Kerjakan</strong>
			</a>
			@endif
			<div class="right">
				<p style="display: inline-block;"><span class="glyphicon glyphicon-heart"></span> {{$a->likes->count() }} Suka</p> 
				<p style="display: inline-block;"><span class="glyphicon glyphicon-play"></span> {{$a->plays->count() }} Dikerjakan</p>
			</div>
		</div>
	</div>
	@endforeach
</div>
<style>
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

	.nav-tab-content {
		max-width: 100%;
		width: 100%;
		margin: 24px 0;
	}


	.section .pin {
		margin-bottom: 33px;
		height: 310px;
		padding: 13px;
		background: white;
		border: 1px solid rgba(0,0,0,.15);
		border-radius: 4px;
		padding: 13px;
	}
	
	.pin:hover{
		box-shadow: 0 6px 12px rgba(0,0,0,.175);
		-webkit-transition: all 0.3s ease-in-out;
		-moz-transition: all 0.3s ease-in-out;
		-o-transition: all 0.3s ease-in-out;
		transition: all 0.3s ease-in-out;

	}
	.pin .act{
		background-color: #fff;
		color: #aaa;
		float: left;
		padding-right: 5px;
	}

	.pin img {
		width: 100%;
		border-bottom: 1px solid #ccc;
		padding-bottom: 15px;
		margin-bottom: 5px;
	}

	
	.Sekolah{
		color: #dd7a78;
	}
	.Universitas{
		color: #0E5C9A;
	}
	.Perushaan{
		color: #A9ABAD;
	}
	.Umum{
		color: #333;
	}

</style>