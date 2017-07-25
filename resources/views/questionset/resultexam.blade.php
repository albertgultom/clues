@extends('layouts.app')

@section('content')
<div class="container">
	@if ($result->count() == 0)
	<br><br>
	<h3 class="center">Belum Ada Yang Mengerjakan Soal Ini!</h3>
	@endif
	<div class="panel panel-default printable">
		<!-- Default panel contents -->
		<div class="panel-heading center">
			<h2 class="blue-clues">
				{{$question_name}}
			</h2>
		</div>
		<!-- Table -->
		<table class="table">
			<thead>
				<tr>
					<th>NAMA</th>
					<th>NILAI</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($result as $a)
				<tr>
					<td>{{$a->user->username}}</td>
					<td>{{$a->score}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div class="center btn-action">
	<button class="btn btn-default blue print-soal">Print Hasil</button>
	<button class="btn btn-default red kembali">Kembali</button>
</div>


<style>
	
</style>
<script>
	$(document).ready(function(){
		$('.print-soal').click(function() {
			var hiddenelement = '.btn-action';
			$(".printable").print({
				iframe : true,
				noPrintSelector : hiddenelement,
				doctype: '<!DOCTYPE html>'

			});
		});
	})
</script>
@endsection