@extends('layouts.app')

@section('content')
<div class="section first">
	<div class="row">
		<div class="col-md-8">
			<h1><strong class="red-clues">LATIHAN</strong> DAN <br> <strong class="blue-clues">BUAT SOAL</strong> <br>DENGAN CARA BARU!</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium quaerat corporis vitae vel architecto nemo officia, odio pariatur error exercitationem, harum dignissimos vero illum dolores nam modi omnis, ad earum!</p>
		</div>
		<div class="col-md-4">
			<div class="card">
				<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
					{{ csrf_field() }}
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
	<div class="section-line">
		<span><strong class="blue-clues">MEMBUAT CLUES</strong></span>
	</div>
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<h3>SEKOLAH</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda ducimus rerum, vero accusantium! Laudantium accusamus, nemo eius praesentium, ipsam recusandae necessitatibus dolore repudiandae, nulla amet facere consequuntur earum asperiores a.</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<h3>UNIVERSITAS</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam molestias obcaecati sequi, ratione veniam ipsam corrupti. Omnis enim, molestiae dolorem quod inventore, labore dolore eveniet repellendus amet. Quam, fuga, dolorum.</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<h3>PERUSAHAAN</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut quaerat nesciunt facilis sapiente repudiandae. Incidunt consequatur nesciunt temporibus quam, consequuntur, culpa doloribus! Doloremque dolore laudantium quidem error consequatur nisi debitis.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section third">

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
		font-size: 13px;
		margin: 20px auto;
	}
	.section-line span{
		font-size: 25px;
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
		font-size: 18px;
	}

	.second .container{
		padding: 0 100px;
	}
	.second .card{
		height: 250px;
	}
</style>
@endsection
