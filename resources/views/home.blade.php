@extends('layouts.app')

@section('content')
<div class="section first">
	<div class="row">
		<div class="col-md-8">
			<h1><strong class="red-clues">LATIHAN</strong> DAN <br> <strong class="blue-clues">BUAT SOAL</strong> <br>DENGAN CARA BARU!</h1>
			<p>CLUES dibuat untuk memudahkan kamu dalam membuat soal dan latihan, dengan tampilan yang bersih, dan dibuat sesimpel mungkin agar kamu tidak bingung lagi mencari referensi soal atau membuat soal.</p>

		</div>
		<div class="col-md-4">
			<div class="card">
				<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
					{{ csrf_field() }}
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label for="name">Nama Lengkap</label>
						<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
						@if ($errors->has('name'))
						<span class="help-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
					</div>
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email">E-Mail</label>
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
						@if ($errors->has('email'))
						<strong>{{ $errors->first('email') }}</strong>
						@endif
					</div>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password">Password</label>
						<input id="password" type="password" class="form-control" name="password" required>
						<label class="input-desc">Gunakan kombinasi huruf dan angka, min 6 karakter</label>
						@if ($errors->has('password'))
						<strong>{{ $errors->first('password') }}</strong>
						@endif
					</div>
					<div class="form-group">
						<label for="password-confirm" >Konfirmasi Password</label>
						<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
					</div>
					<div class="form-group center">
						<button type="submit" class="btn btn-default red">
							Daftar Sekarang
						</button>
					</div>
				</form>
				<div>
					Dengan mengklik "Daftar Sekarang", Anda menerima <a href="">Syarat dan Ketentuan</a> clues.id
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section second">
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="card blue">
					<h3>BUAT SOAL</h3>
					<p>Kamu dapat membuat soal yang kamu inginkan, mulai dari soal untuk keperluan sekolah, universitas, perusahaan, atau yang lainnya. Buat soal dengan kreatifitasmu sekarang!</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-4">
				<div class="card">
					<div class="text-right">
						<h3>LATIHAN</h3>
						<p>Selain kamu dapat membuat soal, kamu juga bisa sekedar latihan dari soal yang dibuat oleh pengguna lain dari berbagai katagori yang ada. Daftar dan cari soal yang kamu inginkan sekarang juga!</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="card red">
					<h3>AMBIL NILAI</h3>
					<p>Setalah kamu membuat soal, kamu bisa mendapat nilai dari user lain yang mengerjakan soal yang kamu buat sebelumnya, dengan fitur ini kamu tidak perlu lagi menulis nilai satu persatu dari soal tersebut.</p>

				</div>
			</div>
		</div>
	</div>
</div>
<div class="section third">
	{{-- <div class="section-line">
		<span><strong class="red-clues">CLUES</strong></span>
	</div> --}}
	<div class="center">
		<h1 class="red-clues">CLUES</h1>
		<p>Mebuat anda terhubung satu sama lain, dengan guru, teman, ataupun pengguna lain yang dapat membuat soal.</p>
		<a style="font-size: 20px;" href="{{ url('register') }}" class="btn btn-default blue-clues">DAFTAR</a>
	</div>
</div>
<style>
	.card{
		border: 2px solid #e5e5e5;
		border-radius: 2px;
		padding: 15px 30px 20px;
		transition: all .2s ease;
	}
	.first .card{
		/*border: 1px solid rgba(0,0,0,.15);*/
		border: 1px solid #000;
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
		background-color: #2B3137;
		margin: 0 auto;
		padding: 60px 100px;
	}
	.first h1{
		color: #fff;
		font-size: 50px;
	}
	.first p{
		font-size: 25px;
	}

	.second .container{
		padding: 0 100px;
	}
	.second .card{
		/*height: 250px;*/
		margin-bottom: 20px;
	}
	.second .card h3{
		font-size: 40px;
	}
	.second .card p{
		font-size: 15px;
	}
	.second .card.blue{
		border-color: #0E5C9A;
	}
	.second .card.red{
		border-color: #dd7a78;
	}
	.third{
		padding: 50px 0;
		background-color: #F2F5F7;
		margin-bottom: -20px;
	}
	.third h1{
		font-size: 50px;
	}
	.third p{
		font-size: 40px;
	}
</style>
@endsection
