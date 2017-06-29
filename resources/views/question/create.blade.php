@extends('layouts.app')

@section('content')
<div class="container">
	@foreach ($questionsets as $questionset)
	<div class="header-soal">
		<h1 class="center judul-soal">{{$questionset->name}}</h1>
		<div class="row">
			<div class="col-md-4 col-md-offset-3">
				<p>Mata Pelajaran : {{$questionset->study_name}}</p>
			</div>
			<div class="col-md-4">
				<p>Jenjang Pendidikan : {{$questionset->level}}</p>
			</div>
			<div class="col-md-4 col-md-offset-3">
				<p>Jumlah Soal : <span class="jmlsoal">1</span></p>
			</div>
			<div class="col-md-4">
				<p>Dibuat Oleh : {{$questionset->user->username}}</p>
			</div>
		</div>
	</div>
	@endforeach

	<div class="soal-container">
		<div class="soal">
			<span class="close">&times;</span>
			<p class="no-soal nomor"></p>
			<div class="editor-container">
			</div>
			<div class="option">
				<p class="no-soal">A.</p>
				<div class="option_a editor-option"></div>
				<p class="no-soal">B.</p>
				<div class="option_b editor-option"></div>
				<p class="no-soal">C.</p>
				<div class="option_c editor-option"></div>
				<p class="no-soal">D.</p>
				<div class="option_d editor-option"></div>
			</div>
		</div>

	</div>
</div>
<div class="center">
	<button class="btn btn-default blue tambah-soal">Tambah Soal</button>
	<button class="btn btn-default blue">Arsip Soal</button>
</div>
<style>
	.editor-container:focus,
	.editor-option:focus{
		outline: none;
	}
	.header-soal{
		margin-bottom: 20px;
		padding-bottom: 7px;
		/*border-bottom: 1px solid #F2F2F2;*/
		border-width: 90%;
	}
	.judul-soal{
		margin-bottom: 10px;
	}
	.soal-container .no-soal{
		position: absolute;
	}
	.soal-container .editor-container,
	.soal-container .editor-option,
	.soal-container .option{
		padding-left: 25px;
		padding-bottom: 5px;
	}
	.soal-container .editor-container p,
	.soal-container .editor-option p{
		color: #444444;
		margin-bottom: 0;
	}
	.soal-container .no-soal{
		margin-right: 8px;
	}
	.soal span.close{
		position: absolute;
		left: 60px;
		margin-top: -6px;
		z-index: 89;
	}
	.soal:hover + .soal span.close{
		pcolor: black;
		text-decoration: none;
		cursor: pointer;
	}
	.medium-editor-placeholder:after {
		cursor: text;
	}
	
</style>
<script>
	$(document).ready(function(){
		
		var editor = new MediumEditor('.editor-container', {
			placeholder: {
				text: 'Tulis Soal',
				hideOnClick: false
			}
		});
		var editor_option = new MediumEditor('.editor-option', {
			placeholder: {
				text: 'Tulis Pilihan',
				hideOnClick: false
			}
		});


		$('.tambah-soal').click(function(e){
			$('.soal-container').append('<div class="soal">'+
				'<span class="close">&times;</span>'+
				'<p class="no-soal nomor"></p>'+
				'<div class="editor-container">'+
				'</div>'+
				'<div class="option">'+
				'	<p class="no-soal">A.</p>'+
				'	<div class="option_a editor-option"></div>'+
				'	<p class="no-soal">B.</p>'+
				'	<div class="option_b editor-option"></div>'+
				'	<p class="no-soal">C.</p>'+
				'	<div class="option_c editor-option"></div>'+
				'	<p class="no-soal">D.</p>'+
				'	<div class="option_d editor-option"></div>'+
				'</div>'+
				'</div>');
			var editor = new MediumEditor('.editor-container', {
				placeholder: {
					text: 'Tulis Soal',
					hideOnClick: false
				}
			});
			var editor_option = new MediumEditor('.editor-option', {
				placeholder: {
					text: 'Tulis Pilihan',
					hideOnClick: false
				}
			});
			(window.jumlahsoal)++;
			reordernomor();
			deletesoal();
		});




		// deklarasi custom function
		window.jumlahsoal = $('.soal').length;
		deletesoal();
		reordernomor();

		function deletesoal(){
			$('.soal .close').click(function() {
				$(this).parents('.soal').remove();
				var n = $('.soal').length;
				window.jumlahsoal = n;
				reordernomor();
			});
		}

		function reordernomor(){
			// console.log(window.jumlahsoal)
			$('.jmlsoal').html(window.jumlahsoal);
			for (var i = 0; i <= window.jumlahsoal; i++) {
				$( ".nomor:eq("+i+")" ).text(i+1);
			}
			if (window.jumlahsoal == 1) {
				$(".soal .close").hide();
			}else{
				$(".soal .close").show();
			}
			// console.log(window.jumlahsoal);
		}


	})
</script>
@endsection