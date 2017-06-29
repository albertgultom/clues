 <form class="form-horizontal" role="form" method="POST" action="{{ url('setsoal') }}">
 	{{ csrf_field() }}

 	<div class="form-group">
 		<label for="name" class="col-md-4 control-label">Nama Soal</label>
 		<div class="col-md-6">
 			<input id="name" type="text" class="form-control" name="name" required autofocus>
 		</div>
 	</div>
 	<div class="form-group">
 		<label for="pendidikan" class="col-md-4 control-label">Pendidikan</label>
 		<div class="col-md-6">
 			<select name="level" id="pendidikan" class="form-control">
 				<option value="" disabled selected></option>
 				<option value="SD - Kelas 1">SD - Kelas 1</option>
 				<option value="SD - Kelas 2">SD - Kelas 2</option>
 				<option value="SD - Kelas 3">SD - Kelas 3</option>
 				<option value="SD - Kelas 4">SD - Kelas 4</option>
 				<option value="SD - Kelas 5">SD - Kelas 5</option>
 				<option value="SD - Kelas 6">SD - Kelas 6</option>
 				<option value="SMP - Kelas 7">SMP - Kelas 7</option>
 				<option value="SMP - Kelas 8">SMP - Kelas 8</option>
 				<option value="SMP - Kelas 9">SMP - Kelas 9</option>
 				<option value="SMA - Kelas 10">SMA - Kelas 10</option>
 				<option value="SMA IPA - Kelas 11">SMA Umum - Kelas 11 </option>
 				<option value="SMA IPA - Kelas 11">SMA IPA - Kelas 11 </option>
 				<option value="SMA IPS - Kelas 11">SMA IPS - Kelas 11</option>
 				<option value="SMA IPA - Kelas 12">SMA Umum - Kelas 12 </option>
 				<option value="SMA IPA - Kelas 12">SMA IPA - Kelas 12 </option>
 				<option value="SMA IPS - Kelas 12">SMA IPS - Kelas 12</option>
 				<option value="SMK">SMK</option>
 				<option value="Lain - lain">Lain - lain</option>
 			</select>
 		</div>
 	</div>
 	<div class="form-group">
 		<label for="mapel" class="col-md-4 control-label">Mata Pelajaran</label>
 		<div class="col-md-6">
 			<select name="mapel" id="mapel" class="form-control">
 				<option value="" disabled selected></option>
 				<option value="Agama">Agama</option>
 				<option value="Kewarganegaraan">Kewarganegaraan</option>
 				<option value="Jasmani dan Kesehatan">Jasmani dan Kesehatan</option>
 				<option value="Teknologi Informatika dan Komunikasi">Teknologi Informatika dan Komunikasi</option>
 				<option value="Bahasa Indonesia">Bahasa Indonesia</option>
 				<option value="Bahasa Inggris">Bahasa Inggris</option>
 				<option value="Bahasa Daerah">Bahasa Daerah</option>
 				<option value="Bahasa Asing">Bahasa Asing</option>
 				<option value="Matematika">Matematika</option>
 				<option value="Ilmu Pengetahuan Alam (UMUM)">Ilmu Pengetahuan Alam (UMUM)</option>
 				<option value="Fisika">Fisika</option>
 				<option value="Biologi">Biologi</option>
 				<option value="Kimia">Kimia</option>
 				<option value="Ilmu Pengetahuan Sosial (UMUM)">Ilmu Pengetahuan Sosial (UMUM)</option>
 				<option value="Sejarah">Sejarah</option>
 				<option value="Geografi">Geografi</option>
 				<option value="Ekonomi">Ekonomi</option>
 				<option value="Sosiologi">Sosiologi</option>
 				<option value="Seni Budaya dan Keterampilan (UMUM)">Seni Budaya dan Keterampilan (UMUM)</option>
 				<option value="Seni Musik">Seni Musik</option>
 				<option value="Seni Rupa">Seni Rupa</option>
 				<option value="Seni Keterampilan">Seni Keterampilan</option>
 				<option value="Seni Tari">Seni Tari</option>
 			</select>
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
 		<div class="col-md-8 col-md-offset-4">
 			<button type="submit" class="btn btn-default red">
 				Selanjutnya
 			</button>
 		</div>
 	</div>

 </form>