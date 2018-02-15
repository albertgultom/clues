@extends('layouts.app')

@section('content')
<div class="section first">
	<div class="row">
		<div class="col-md-8">
			<h1><strong class="red-clues">LATIHAN</strong> DAN <br> <strong class="blue-clues">BUAT SOAL</strong> <br>DENGAN CARA BARU!</h1>
			<p>CLUES dibuat untuk memudahkan kamu dalam membuat soal dan latihan, dengan tampilan yang bersih, dan dibuat sesimpel mungkin agar kamu tidak bingung lagi mencari dan membuat soal.</p>
			<div class="center-on-small-only">
				<a href="{{ url('register') }}" class="btn btn-default red-clues">DAFTAR SEKARANG!</a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="center hide-on-large-only">
				<div class="divider"></div>
				<img style="margin-right: -42px;" src="{{ asset('img/home-ilus.png') }}" class="responsive-img" alt="">
			</div>
		</div>
		<img src="{{ asset('img/home-ilus.png') }}" class="responsive-img home-ilus hide-on-med-and-down" alt="">
	</div>
</div>

<style>
.home-ilus{
	position: absolute;
	right: 0;
	top: 0;
	width: 485px;
}
.card{
	border: 2px solid #e5e5e5;
	border-radius: 2px;
	padding: 15px 30px 20px;
	transition: all .2s ease;
}
.first .card{
	border: 1px solid rgba(0,0,0,.15);
	/*border: 1px solid #000;*/
	border-radius: 4px;
	box-shadow: 0 6px 12px rgba(0,0,0,.175);
	padding: 10px 30px;
}
.section-line{
	width: 90%;
	position: relative;
	display: block;
	border-bottom: 1px solid #dee0df;
	color: #f4645f;
	text-align: center;
	margin: 20px auto;
}
.section-line span{
	font-size: 13px;
	position: relative;
	top: 14px;
	background: #fff;
	padding: 0 20px;
}

.first{
	position: relative;
	top: -20px;
	background-color: #fff;
	margin: 0 auto;
	padding: 30px 100px;
}
.first h1{
	color: #333;
	font-size: 50px;
}
.first p{
	font-size: 25px;
}

@media screen and (max-width: 800px) {
	.first{
		padding: 20px;
	}
	.first h1{
		font-size: 30px;
		text-align: center;
	}
	.first p{
		font-size: 17px;
		text-align: center;
	}
}
</style>
@endsection
