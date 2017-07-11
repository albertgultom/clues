 <form class="form-horizontal" role="form" method="POST" action="{{ url('setsoal') }}">
 	{{ csrf_field() }}
 	<input type="hidden" name="id" value="{{ $questionset->id }}}">

 	<div class="form-group">
 		<label for="name" class="col-md-4 control-label">Nama Soal</label>
 		<div class="col-md-6">
 			<input id="name" type="text" class="form-control" name="name" required autofocus value="{{$questionset->name}}">
 		</div>
 	</div>
 	<div class="form-group">
 		<label for="pendidikan" class="col-md-4 control-label">Pendidikan</label>
 		<div class="col-md-6">
 			<select name="level" id="pendidikan" class="form-control">
 				<option value="" disabled selected></option>
 				<option {{$questionset->level == 'SD - Kelas 1' ? 'selected' : ''}} value="SD - Kelas 1">SD - Kelas 1</option>
 				<option {{$questionset->level == 'SD - Kelas 2' ? 'selected' : ''}} value="SD - Kelas 2">SD - Kelas 2</option>
 				<option {{$questionset->level == 'SD - Kelas 3' ? 'selected' : ''}} value="SD - Kelas 3">SD - Kelas 3</option>
 				<option {{$questionset->level == 'SD - Kelas 4' ? 'selected' : ''}} value="SD - Kelas 4">SD - Kelas 4</option>
 				<option {{$questionset->level == 'SD - Kelas 5' ? 'selected' : ''}} value="SD - Kelas 5">SD - Kelas 5</option>
 				<option {{$questionset->level == 'SD - Kelas 6' ? 'selected' : ''}} value="SD - Kelas 6">SD - Kelas 6</option>
 				<option {{$questionset->level == 'SMP - Kelas 7' ? 'selected' : ''}} value="SMP - Kelas 7">SMP - Kelas 7</option>
 				<option {{$questionset->level == 'SMP - Kelas 8' ? 'selected' : ''}} value="SMP - Kelas 8">SMP - Kelas 8</option>
 				<option {{$questionset->level == 'SMP - Kelas 9' ? 'selected' : ''}} value="SMP - Kelas 9">SMP - Kelas 9</option>
 				<option {{$questionset->level == 'SMA - Kelas 10' ? 'selected' : ''}} value="SMA - Kelas 10">SMA - Kelas 10</option>
 				<option {{$questionset->level == 'SMA Umum - Kelas 11' ? 'selected' : ''}} value="SMA Umum - Kelas 11">SMA Umum - Kelas 11 </option>
 				<option {{$questionset->level == 'SMA IPA - Kelas 11' ? 'selected' : ''}} value="SMA IPA - Kelas 11">SMA IPA - Kelas 11 </option>
 				<option {{$questionset->level == 'SMA IPS - Kelas 11' ? 'selected' : ''}} value="SMA IPS - Kelas 11">SMA IPS - Kelas 11</option>
 				<option {{$questionset->level == 'SMA Umum - Kelas 12' ? 'selected' : ''}} value="SMA Umum - Kelas 12">SMA Umum - Kelas 12 </option>
 				<option {{$questionset->level == 'SMA IPA - Kelas 12' ? 'selected' : ''}} value="SMA IPA - Kelas 12">SMA IPA - Kelas 12 </option>
 				<option {{$questionset->level == 'SMA IPS - Kelas 12' ? 'selected' : ''}} value="SMA IPS - Kelas 12">SMA IPS - Kelas 12</option>
 				<option {{$questionset->level == 'SMK' ? 'selected' : ''}} value="SMK">SMK</option>
 				<option {{$questionset->level == 'Lain - lain' ? 'selected' : ''}} value="Lain - lain">Lain - lain</option>
 			</select>
 		</div>
 	</div>
 	<div class="form-group">
 		<label for="mapel" class="col-md-4 control-label">Mata Pelajaran</label>
 		<div class="col-md-6">
 			<select name="mapel" id="mapel" class="form-control">
 				<option value="" disabled selected></option>
 				<option {{$questionset->study_name == 'Agama' ? 'selected' : ''}} value="Agama">Agama</option>
 				<option {{$questionset->study_name == 'Kewarganegaraan' ? 'selected' : ''}} value="Kewarganegaraan">Kewarganegaraan</option>
 				<option {{$questionset->study_name == 'Jasmani dan Kesehatan' ? 'selected' : ''}} value="Jasmani dan Kesehatan">Jasmani dan Kesehatan</option>
 				<option {{$questionset->study_name == 'Teknologi Informatika dan Komunikasi' ? 'selected' : ''}} value="Teknologi Informatika dan Komunikasi">Teknologi Informatika dan Komunikasi</option>
 				<option {{$questionset->study_name == 'Bahasa Indonesia' ? 'selected' : ''}} value="Bahasa Indonesia">Bahasa Indonesia</option>
 				<option {{$questionset->study_name == 'Bahasa Inggris' ? 'selected' : ''}} value="Bahasa Inggris">Bahasa Inggris</option>
 				<option {{$questionset->study_name == 'Bahasa Daerah' ? 'selected' : ''}} value="Bahasa Daerah">Bahasa Daerah</option>
 				<option {{$questionset->study_name == 'Bahasa Asing' ? 'selected' : ''}} value="Bahasa Asing">Bahasa Asing</option>
 				<option {{$questionset->study_name == 'Matematika' ? 'selected' : ''}} value="Matematika">Matematika</option>
 				<option {{$questionset->study_name == 'Ilmu Pengetahuan Alam (UMUM)' ? 'selected' : ''}} value="Ilmu Pengetahuan Alam (UMUM)">Ilmu Pengetahuan Alam (UMUM)</option>
 				<option {{$questionset->study_name == 'Fisika' ? 'selected' : ''}} value="Fisika">Fisika</option>
 				<option {{$questionset->study_name == 'Biologi' ? 'selected' : ''}} value="Biologi">Biologi</option>
 				<option {{$questionset->study_name == 'Kimia' ? 'selected' : ''}} value="Kimia">Kimia</option>
 				<option {{$questionset->study_name == 'Ilmu Pengetahuan Sosial (UMUM)' ? 'selected' : ''}} value="Ilmu Pengetahuan Sosial (UMUM)">Ilmu Pengetahuan Sosial (UMUM)</option>
 				<option {{$questionset->study_name == 'Sejarah' ? 'selected' : ''}} value="Sejarah">Sejarah</option>
 				<option {{$questionset->study_name == 'Geografi' ? 'selected' : ''}} value="Geografi">Geografi</option>
 				<option {{$questionset->study_name == 'Ekonomi' ? 'selected' : ''}} value="Ekonomi">Ekonomi</option>
 				<option {{$questionset->study_name == 'Sosiologi' ? 'selected' : ''}} value="Sosiologi">Sosiologi</option>
 				<option {{$questionset->study_name == 'Seni Budaya dan Keterampilan (UMUM)' ? 'selected' : ''}} value="Seni Budaya dan Keterampilan (UMUM)">Seni Budaya dan Keterampilan (UMUM)</option>
 				<option {{$questionset->study_name == 'Seni Musik' ? 'selected' : ''}} value="Seni Musik">Seni Musik</option>
 				<option {{$questionset->study_name == 'Seni Rupa' ? 'selected' : ''}} value="Seni Rupa">Seni Rupa</option>
 				<option {{$questionset->study_name == 'Seni Keterampilan' ? 'selected' : ''}} value="Seni Keterampilan">Seni Keterampilan</option>
 				<option {{$questionset->study_name == 'Seni Tari' ? 'selected' : ''}} value="Seni Tari">Seni Tari</option>
 			</select>
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
 		<div class="col-md-8 col-md-offset-4">
 			<button type="submit" class="btn btn-default red">
 				Simpan
 			</button>
 		</div>
 	</div>

 </form>