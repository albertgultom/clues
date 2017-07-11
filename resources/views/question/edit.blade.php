@extends('layouts.app')

@section('content')
<div class="content-saved">
	<div class="center">
		<div class="btn red">Tersimpan</div>
		
	</div>
</div>

<div class="container">
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
				<p>Waktu Soal : {{$questionset->time}}</p>
			</div>
		</div>
	</div>

	<div class="soal-container">
		@foreach ($questions as $question)
		<div class="soal" data-id="{{$question->id}}">
			<span class="close">&times;</span>
			<p class="no-soal nomor"></p>
			<div data-soal="question" class="editor-container">
				{!! $question->question !!}
			</div>
			<div class="option">
				<p class="no-soal">A.</p>
				<div data-soal="option_a" class="editor-option">{!!$question->option_a!!}</div>
				<p class="no-soal">B.</p>
				<div data-soal="option_b" class="editor-option">{!!$question->option_b!!}</div>
				<p class="no-soal">C.</p>
				<div data-soal="option_c" class="editor-option">{!!$question->option_c!!}</div>
				<p class="no-soal">D.</p>
				<div data-soal="option_d" class="editor-option">{!!$question->option_d!!}</div>
				<p class="no-soal">E.</p>
				<div data-soal="option_e" class="editor-option">{!!$question->option_e!!}</div>
			</div>
			<div class="option">
				<div class="row">
					<div class="form-group">
						<label for="answer_true" class="col-md-1 control-label">Jawaban Benar</label>
						<div class="col-md-3">
							<select name="answer_true" data-soal="answer_true" id="answer_true" class="answer_true form-control">
								<option value="" disabled selected></option>
								<option {{$question->answer_true == 'A' ? 'selected' : ''}} value="A">A</option>
								<option {{$question->answer_true == 'B' ? 'selected' : ''}} value="B">B</option>
								<option {{$question->answer_true == 'C' ? 'selected' : ''}} value="C">C</option>
								<option {{$question->answer_true == 'D' ? 'selected' : ''}} value="D">D</option>
								<option {{$question->answer_true == 'E' ? 'selected' : ''}} value="E">E</option>
							</select>
						</div>
					</div>
				</div>
				<div class="no-soal">
					<span class="glyphicon glyphicon-exclamation-sign"></span>
				</div>
				<div data-soal="penjelasan" class="editor-penjelasan">
					{!!$question->explanation!!}
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="center btn-action">
	<button class="btn btn-default blue tambah-soal" data-id="{{$questionset->id}}">Tambah Soal</button>
	@if ($questionset->post == '0')
	<button class="btn btn-default blue posting-soal" data-id="{{$questionset->id}}">Posting Soal</button>
	@else
	<button class="btn btn-default blue arsip-soal" data-id="{{$questionset->id}}">Arsip Soal</button>
	@endif
	<a href="{{ url('user') }}" class="btn btn-default red">Kembali</a>
</div>
<style>
	.btn-action{
		margin-top: 20px;
	}
	.editor-container:focus,
	.editor-option:focus,
	.editor-penjelasan:focus{
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
	.soal-container .editor-penjelasan,
	.soal-container .option{
		padding-left: 25px;
		padding-bottom: 5px;
	}
	.soal-container .editor-container p,
	.soal-container .editor-penjelasan p,
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

	.content-saved{
		position: fixed;
		/*display: none;*/
		z-index: -99;
		opacity: 0;
		top: 20px;
		left: 10px;
		right: 10px;
		text-align: center
		transition: all 0.3s ease-in-out;
	}

	.content-saved.show{
		z-index: 10;
		opacity: 1;
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

		var editor_penjelasan = new MediumEditor('.editor-penjelasan', {
			placeholder: {
				text: 'Tulis Penjelasan',
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
			var idsoal = $(this).data('id');
			$.ajax({
				url: '{{ url('create_question') }}'+'/'+idsoal,
				type: 'GET'
			}).done(function(id){
				$('.soal-container').append('<div class="soal" data-id="'+id+'">'+
					'<span class="close">&times;</span>'+
					'<p class="no-soal nomor"></p>'+
					'<div data-soal="question" class="editor-container">'+
					'</div>'+
					'<div class="option">'+
					'	<p class="no-soal">A.</p>'+
					'	<div data-soal="option_a" class="editor-option"></div>'+
					'	<p class="no-soal">B.</p>'+
					'	<div data-soal="option_b" class="editor-option"></div>'+
					'	<p class="no-soal">C.</p>'+
					'	<div data-soal="option_c" class="editor-option"></div>'+
					'	<p class="no-soal">D.</p>'+
					'	<div data-soal="option_d" class="editor-option"></div>'+
					'	<p class="no-soal">E.</p>'+
					'	<div data-soal="option_e" class="editor-option"></div>'+
					'</div>'+
					'<div class="option">'+
					'	<div class="row">'+
					'		<div class="form-group">'+
					'			<label for="answer_true" class="col-md-1 control-label">Jawaban Benar</label>'+
					'			<div class="col-md-3">'+
					'				<select name="answer_true" data-soal="answer_true" id="answer_true" class="answer_true form-control">'+
					'					<option value="" disabled selected></option>'+
					'					<option value="A">A</option>'+
					'					<option value="B">B</option>'+
					'					<option value="C">C</option>'+
					'					<option value="D">D</option>'+
					'					<option value="E">E</option>'+
					'				</select>'+
					'			</div>'+
					'		</div>'+
					'	</div>'+
					'	<div class="no-soal">'+
					'		<span class="glyphicon glyphicon-exclamation-sign"></span>'+
					'	</div>'+
					'	<div data-soal="penjelasan" class="editor-penjelasan">'+
					'	</div>'+
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
				save();
				save2();
			})
			
		});

		$('.posting-soal').click(function(event) {
			var id = $(this).data('id');
			var data = {
				_token: '{{ csrf_token() }}',
				id: id
			}
			$.ajax({
				data: data,
				type: 'POST',
				url: '{{ url('posting_questionset') }}',
				success: function(result){
					window.location = '{{ url('user') }}'
				},
				beforeSend: function(){
					$('.bar-container').css('visibility', 'visible');
				},
				complete: function(){
					$('.bar-container').css('visibility', 'hidden');
				}
			})
		});

		$('.arsip-soal').click(function(event) {
			var id = $(this).data('id');
			var data = {
				_token: '{{ csrf_token() }}',
				id: id
			}
			$.ajax({
				data: data,
				type: 'POST',
				url: '{{ url('archive_questionset') }}',
				success: function(result){
					window.location = '{{ url('user') }}'
				},
				beforeSend: function(){
					$('.bar-container').css('visibility', 'visible');
				},
				complete: function(){
					$('.bar-container').css('visibility', 'hidden');
				}
			})
		});




		// deklarasi custom function
		window.jumlahsoal = $('.soal').length;
		deletesoal();
		reordernomor();
		save();
		save2();


		function save(){
			$('.editor-container, .editor-option, .editor-penjelasan').focusout(function(){
				
				var id = $(this).parents('.soal').data('id');
				var content = $(this).html();
				// console.log(content);
				if ($(this).data('soal') == 'question') {
					var data = {
						save_for : 'question',
						content : content,
						id : id,
						_token : '{{csrf_token()}}'
					}
				}else if($(this).data('soal') == 'option_a'){
					var data = {
						save_for : 'option_a',
						content : content,
						id : id,
						_token : '{{csrf_token()}}'
					}
				}else if($(this).data('soal') == 'option_b'){
					var data = {
						save_for : 'option_b',
						content : content,
						id : id,
						_token : '{{csrf_token()}}'
					}
				}else if($(this).data('soal') == 'option_c'){
					var data = {
						save_for : 'option_c',
						content : content,
						id : id,
						_token : '{{csrf_token()}}'
					}
				}else if($(this).data('soal') == 'option_d'){
					var data = {
						save_for : 'option_d',
						content : content,
						id : id,
						_token : '{{csrf_token()}}'
					}
				}else if($(this).data('soal') == 'option_e'){
					var data = {
						save_for : 'option_e',
						content : content,
						id : id,
						_token : '{{csrf_token()}}'
					}
				}else if($(this).data('soal') == 'penjelasan'){
					var data = {
						save_for : 'penjelasan',
						content : content,
						id : id,
						_token : '{{csrf_token()}}'
					}
				}

				$.ajax({
					data: data,
					type: 'POST',
					url : '{{ url('store_question') }}',
					success: function(data){
						if (data == 'saved') {
							$('.content-saved').addClass('show');
							setTimeout(function(){
								$('.content-saved').removeClass('show');
							}, 1000);
						}
					}
				})
			})
		}

		function save2(){
			$('.answer_true').change(function(){
				var id = $(this).parents('.soal').data('id');
				var content = $(this).val();
				var data = {
					save_for : 'answer_true',
					content : content,
					id : id,
					_token : '{{csrf_token()}}'
				}
				$.ajax({
					data: data,
					type: 'POST',
					url : '{{ url('store_question') }}',
					success: function(data){
						if (data == 'saved') {
							$('.content-saved').addClass('show');
							setTimeout(function(){
								$('.content-saved').removeClass('show');
							}, 1000);
						}
					}
				})

			})
		}

		function deletesoal(){
			$('.soal .close').click(function() {
				var id = $(this).parents('.soal').data('id');
				$.ajax({
					url: '{{ url('delete_question') }}'+'/'+id,
					type: 'GET',
				});
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