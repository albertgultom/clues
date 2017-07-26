 @if ($questionset != null)
 <form class="form-horizontal" role="form" method="POST" action="{{ url('setsoal') }}">
 	{{ csrf_field() }}
 	<input type="hidden" name="id" value="{{ $questionset->id != '' ? $questionset->id : ''}}">
 	<div class="form-group">
 		<label for="name" class="col-md-4 control-label">Nama Soal</label>
 		<div class="col-md-6">
 			<input id="name" type="text" class="form-control" name="name" value="{{ $questionset->name != '' ? $questionset->name : ''}}" required autofocus>
 		</div>
 	</div>
 	<div class="form-group">
 		<label for="mapel" class="col-md-4 control-label">Tag</label>
 		<div class="col-md-6">
 			<input id="mapel" type="text" class="tm-input form-control" >
 		</div>
 	</div>
 	<div class="form-group">

 		<label for="time" class="col-md-4 control-label">Waktu Pengerjaan</label>
 		<div class="col-md-6">
 			<select name="time" id="time" class="form-control">
 				<option value="" disabled selected></option>
 				<option {{$questionset->time == '30' ? 'selected' : ''}} value="30">30 Menit</option>
 				<option {{$questionset->time == '45' ? 'selected' : ''}} value="45">45 Menit</option>
 				<option {{$questionset->time == '60' ? 'selected' : ''}} value="60">60 Menit</option>
 				<option {{$questionset->time == '90' ? 'selected' : ''}} value="90">90 Menit</option>
 				<option {{$questionset->time == '120' ? 'selected' : ''}} value="120">120 Menit</option>
 			</select>
 		</div>
 	</div>
 	<div class="form-group">
 		<label for="token" class="col-md-4 control-label">Token Soal</label>
 		<div class="col-md-6">
 			<input id="token" type="text" name="token" value="{{$questionset->token}}" class="form-control">
 			<label class="input-desc">Isi token untuk mendapat hasil nilai (tidak wajib)</label>
 		</div>
 	</div>

 	<div class="form-group">
 		<div class="col-md-8 col-md-offset-4">
 			<button type="submit" class="btn btn-default red">
 				Simpan
 			</button>
 		</div>
 	</div>
 </form>
 
 <script>
 	$(document).ready(function(){
 		$('.tm-input').tagsManager({
 			prefilled: '{{ $questionset->study_name != '' ? $questionset->study_name : ''}}',
 			delimiters: [32, 9],
 			hiddenTagListName: 'mapel'
 		});
 	})
 </script>
 
 @else

 <form class="form-horizontal" role="form" method="POST" action="{{ url('setsoal') }}">
 	{{ csrf_field() }}
 	<input type="hidden" name="id" value="">
 	<div class="form-group">
 		<label for="name" class="col-md-4 control-label">Nama Soal</label>
 		<div class="col-md-6">
 			<input id="name" type="text" class="form-control" name="name" required autofocus>
 		</div>
 	</div>
 	<div class="form-group">
 		<label for="mapel" class="col-md-4 control-label">Tag</label>
 		<div class="col-md-6">
 			<input id="mapel" type="text" class="tm-input form-control" autofocus>
 			<input type="hidden" name="mapel" class="tm-input form-control" autofocus>
 		</div>
 	</div>

 	<div class="form-group">
 		<label for="time" class="col-md-4 control-label">Waktu Pengerjaan</label>
 		<div class="col-md-6">
 			<select name="time" id="time" class="form-control">
 				<option value="" disabled selected></option>
 				<option value="30">30 Menit</option>
 				<option value="45">45 Menit</option>
 				<option value="60">60 Menit</option>
 				<option value="90">90 Menit</option>
 				<option value="120">120 Menit</option>
 			</select>
 		</div>
 	</div>
 	<div class="form-group">
 		<label for="token" class="col-md-4 control-label">Token Soal</label>
 		<div class="col-md-6">
 			<input id="token" type="text" name="token" class="form-control">
 			<label class="input-desc">Isi token untuk mendapat hasil nilai (tidak wajib)</label>
 		</div>
 	</div>

 	<div class="form-group">
 		<div class="col-md-8 col-md-offset-4">
 			<button type="submit" class="btn btn-default red">
 				Selanjutnya
 			</button>
 		</div>
 	</div>
 </form>
 
 <script>
 	$(document).ready(function(){
 		$('.tm-input').tagsManager({
 			delimiters: [32, 9]
 		});
 		$('[name="hidden-undefined"]').change(function(event) {
 			$('[name="mapel"]').val($(this).val());
 		});
 	})
 </script>
 @endif
