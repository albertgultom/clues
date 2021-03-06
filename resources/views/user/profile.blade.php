@extends('layouts.app')

@section('content')
<div class="container">
	<div class="profile-container hide-on-small-only">
		<div class="right">
			<a href="{{ url('settings') }}">
				<span class="glyphicon glyphicon-pencil edit" data-toggle="tooltip" data-placement="bottom" title="Edit/Pengaturan"></span>
			</a>
			<a href="{{ url('logout') }}">
				<span class="glyphicon glyphicon-log-out logout" style="margin: 0 10px;" data-toggle="tooltip" data-placement="bottom" title="Keluar"></span>
			</a>
		</div>
		<div class="left">
			<div class="profile-picture circle">
				<img class="responsive-img" src="{{ Auth::user()->avatar == '' ? asset('images/default_pic.png') : asset('storage/avatar/'.Auth::user()->avatar.'') }}" alt="">
			</div>
			<p class="center username" style="margin-top: 11px;">{{ Auth::user()->username}}</p>
		</div>
		<div class="description">
			<h1 class="name">{!! Auth::user()->name == '' ? '<span>Tambahkan Nama Anda</span>' : Auth::user()->name !!}</h1>
			<a style="margin-left: 0;" href="#" class="mymodal foll" data-target="modal-clues" data-header="Pengikut" data-body="{{ url('followers') }}"><span>{{ Auth::user()->followers->count() }}</span> Pengikut</a>
			<a href="#" class="mymodal foll" data-target="modal-clues" data-header="Diikuti" data-body="{{ url('followings') }}"><span>{{ Auth::user()->followings->count() }}</span> Diikuti</a>
			<p class="foll"><span>{{ $countpost }}</span> Kiriman Soal</p>
			<div class="bio">{!! Auth::user()->biography == '' ? '<span>Tambahkan Bio Anda</span>' : Auth::user()->biography !!}</div>
		</div>
	</div>
	<div class="hide-on-med-and-up mobile">
		<div class="row">
			<div class="profile-picture circle">
				<img class="responsive-img" src="{{ Auth::user()->avatar == '' ? asset('images/default_pic.png') : asset('storage/avatar/'.Auth::user()->avatar.'') }}" alt="">
			</div>
			<p class="center username" style="margin-top: 11px;">{{ Auth::user()->username}}</p>
			<div style="position: absolute; top: 75px; right: 10px;">
				<a href="{{ url('settings') }}" class="red-clues">
					<span class="glyphicon glyphicon-pencil edit" data-toggle="tooltip" data-placement="bottom" title="Edit/Pengaturan"></span>
				</a>
				<a href="{{ url('logout') }}" class="red-clues">
					<span class="glyphicon glyphicon-log-out logout" style="margin: 0 10px;" data-toggle="tooltip" data-placement="bottom" title="Keluar"></span>
				</a>
			</div>
		</div>
		<div class="row center">
			<h1 class="name">{!! Auth::user()->name == '' ? '<span>Tambahkan Nama Anda</span>' : Auth::user()->name !!}</h1>
			<a style="margin-left: 0;" href="#" class="mymodal foll" data-target="modal-clues" data-header="Pengikut" data-body="{{ url('followers') }}"><span>{{ Auth::user()->followers->count() }}</span> Pengikut</a>
			<a href="#" class="mymodal foll" data-target="modal-clues" data-header="Diikuti" data-body="{{ url('followings') }}"><span>{{ Auth::user()->followings->count() }}</span> Diikuti</a>
			<p class="foll"><span>{{ $countpost }}</span> Kiriman Soal</p>
			
			<div class="center">{!! Auth::user()->biography == '' ? '' : Auth::user()->biography !!}</div>
		</div>
	</div>

	<div class="nav-clues">
		<ul>
			<li><button class="btn btn-default active" data-content="postedquestion">Kiriman</button></li>
			<li><button class="btn btn-default" data-content="archivequestion">Arsip</button></li>
		</ul>
		<div class="nav-tab-content">
			
		</div>
	</div>
</div>


<style>

/*mobile*/
.mobile .profile-picture{
	margin: 0 auto;
	height: 70px;
	width: 70px;
}

.nav-clues ul{
	padding: 10px 0;
	border-bottom: 1px solid #F2F2F2;
	margin-bottom: 20px;
}
.nav-clues ul li{
	display: inline-block;
	list-style: none;
}
.nav-clues li button.btn.active:focus{
	outline: none;
}
.nav-tab-content {
	max-width: 100%;
	width: 100%;
	margin: 24px 0;
}

/*profile*/
.profile-container{
	min-height: 200px;
}
.profile-container .foll{
	display: inline-block;
	margin: 10px 7px;
	color: #444;
}
.profile-container .foll span{
	color: #333;
	font-family: 'Oxygen-Bold', sans-serif;
}
.profile-container .edit ,
.profile-container .logout {
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
	// declare function
	openquestion('postedquestion');

	function openquestion(content){
		// console.log(content);
		$.ajax({
			type: 'GET',
			data: 'id={{Auth::user()->id}}',
			url: content,
			success: function(data){
				$('.nav-clues .nav-tab-content').html('');
				$('.nav-clues .nav-tab-content').html(data);
			},
			beforeSend: function(){
				$('.bar-container').css('visibility', 'visible');
			},
			complete: function(){
				$('.bar-container').css('visibility', 'hidden');
			}
		})
	}


	$('.nav-clues ul li button').click(function() {
		var content = $(this).data('content');
		$('.nav-clues ul li button').removeClass('active');
		if ($(this).hasClass('active') == false) {
			$(this).addClass('active');
			openquestion(content);	
		}
	});


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