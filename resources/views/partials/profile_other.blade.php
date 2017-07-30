<div class="profile-container hide-on-small-only">
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
<div class="hide-on-med-and-up mobile">
	<div class="row">
		<div class="profile-picture circle">
			<img class="responsive-img" src="{{ Auth::user()->avatar == '' ? asset('images/default_pic.png') : asset('storage/avatar/'.Auth::user()->avatar.'') }}" alt="">
		</div>
		<p class="center username" style="margin-top: 11px;">{{ Auth::user()->username}}</p>
	</div>
	<div class="row center">
		<h1 class="name">{!! $user->name == '' ? '<span>Nama belum ditambahkan</span>' : $user->name !!}</h1>
		<a style="margin-left: 0;" href="#" class="mymodal foll" data-target="modal-clues" data-header="Pengikut" data-body="{{ url('followers/'.$user->id) }}"><span>{{ $user->followers->count() }}</span> Pengikut</a>
		<a hstyle="margin-left: 0;" href="#" class="mymodal foll" data-target="modal-clues" data-header="Diikuti" data-body="{{ url('followings/'.$user->id) }}"><span>{{ $user->followings->count() }}</span> Diikuti</a>
		<p class="foll"><span>{{ $countpost }}</span> Kiriman Soal</p>
		@if (Auth::user()->username != $user->username)
		<button class="foll following btn btn-default">{{ $following == 1 ? 'Following' : 'Follow'}}</button>
		@endif
		<div class="center">{!! $user->biography !!}</div>
	</div>
	<div class="divider"></div>
</div>

<style>
	.mobile .profile-picture{
		margin: 0 auto;
		height: 70px;
		width: 70px;
	}


	/*profile*/
	.profile-picture{
		overflow: hidden;
		height: 150px;
		width: 150px;
	}
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
	
	.bio{
		max-width: 60%;
	}
</style>