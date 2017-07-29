@extends('layouts.app')

@section('content')
<div class="section first">
	<div class="row">
		<div class="col-md-8">
			<h1><strong class="red-clues">LATIHAN</strong> DAN <br> <strong class="blue-clues">BUAT SOAL</strong> <br>DENGAN CARA BARU!</h1>
			<p>CLUES dibuat untuk memudahkan kamu dalam membuat soal dan latihan, dengan tampilan yang bersih, dan dibuat sesimpel mungkin agar kamu tidak bingung lagi mencari referensi soal atau membuat soal.</p>
		</div>
		<div class="col-md-4">
			<div class="center hide-on-large-only">
				<div class="divider"></div>
				<br><br>
				<a href="{{ url('register') }}" class="btn btn-default red-clues">DAFTAR SEKARANG!</a>
			</div>
			<div class="card hide-on-med-and-down">
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
				<div style="font-size: 10px;">
					Dengan mengklik "Daftar Sekarang", Anda menerima <a href="syaratketentuan">Syarat dan Ketentuan</a> clues.id
				</div>
			</div>
		</div>
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
