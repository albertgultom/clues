<div class="alert red-clues" style="display: none;">
</div>
<form class="form-horizontal" role="form">
	<div class="form-group">
		<label for="token" class="col-md-4 control-label">Masukan Token</label>
		<div class="col-md-6">
			<input id="token" type="text" class="form-control" name="verify_token" required autofocus>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-8 col-md-offset-4">
			<button type="submit" class="btn btn-default red">
				Lanjutkan
			</button>
		</div>
	</div>
</form>
<style>
	
</style>
<script>
	$(document).ready(function(){
		$('[type="submit"]').click(function(event) {
			event.preventDefault();
			data = {
				id: '{{$idsoal}}',
				token: $('#token').val(),
				_token: '{{csrf_token()}}'
			}
			$.ajax({
				url: '{{ url('checktoken') }}',
				type: 'POST',
				data: data,
				success: function(data){
					if (data == 'match') {
						window.location.href = 'question/{{$idsoal}}/play';
					}else{
						$('.alert').css('display', 'block');
						$('.alert').html(data);
					}
				},
				beforeSend: function(){
					$('.bar-container').css('visibility', 'visible');
				},
				complete: function(){
					$('.bar-container').css('visibility', 'hidden');
				}
			})
		});
	})
</script>