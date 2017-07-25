<form action="{{ url('changepassword') }}" method="POST">
	{{ csrf_field() }}
	<div class="col">
		<div class="row">
			<div class="col-md-12">
				<label for="password">Password baru</label>
				<input type="password" class="form-control" name="password">
			</div>
			<div class="col-md-12">
				<label for="pass">Konfirmasi Password</label>
				<input type="password" class="form-control" name="password_confirmation">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 center">
				<br>
				<button type="submit" class="btn btn-default">SIMPAN</button>
			</div>
		</div>
	</div>
</form>