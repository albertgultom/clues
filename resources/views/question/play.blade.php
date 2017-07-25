@extends('layouts.app')

@section('content')
<script src="{{ asset('js/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('js/jquery.cookie.js') }}"></script>
<div class="container">
	<div class="nilai center">
		<div>Nilai anda</div>
		<h1 class="result">70</h1>
	</div>
	<div class="container">
		<div class="header-soal">
			<h1 class="center judul-soal">{{$questionset->name}}</h1>
			<div class="row">
				<div class="col-md-12 center">
					<span data-toggle="tooltip" data-placement="bottom" title="Tag" class="glyphicon glyphicon-tag"></span> {{$questionset->study_name}}
				</div>
				<div class="col-md-12 center">
					<p>Jumlah Soal : <span class="jmlsoal">1</span></p>
				</div>
				<div class="col-md-12 center">
					<p>Waktu Pengerjaan : <span class="countdown">00:00:00</span></p>
				</div>
			</div>
		</div>

		<div class="soal-container">
			@foreach ($questions as $question)
			<div class="soal" data-id="{{$question->id}}">

				<p class="no-soal nomor"></p>
				<div data-soal="question" class="editor-container">
					{!! $question->question !!}
				</div>
				<div class="option">
					<div class="radio">
						<input id="a_" type="radio" name="{{$question->id}}" value="A">
						<label for="a_">
							<div style="position: absolute; color: #333; z-index: 10;">A</div>
							<div class="option_question">
								{!!$question->option_a!!}
							</div>
						</label>
					</div>
					<div class="radio">
						<input id="b_" type="radio" name="{{$question->id}}" value="B">
						<label for="b_">
							<div style="position: absolute; color: #333; z-index: 10;">B</div>
							<div class="option_question">
								{!!$question->option_b!!}
							</div>
						</label>
					</div>
					<div class="radio">
						<input id="c_" type="radio" name="{{$question->id}}" value="C">
						<label for="c_">
							<div style="position: absolute; color: #333; z-index: 10;">C</div>
							<div class="option_question">
								{!!$question->option_c!!}
							</div>
						</label>
					</div>
					<div class="radio">
						<input id="d_" type="radio" name="{{$question->id}}" value="D">
						<label for="d_">
							<div style="position: absolute; color: #333; z-index: 10;">D</div>
							<div class="option_question">
								{!!$question->option_d!!}
							</div>
						</label>
					</div>
					@if ($question->option_e != '<p><br></p>' && $question->option_e != NULL)
					<div class="radio">
						<input id="e_" type="radio" name="{{$question->id}}" value="E">
						<label for="e_">
							<div style="position: absolute; color: #333; z-index: 10;">E</div>
							<div class="option_question">
								{!!$question->option_e!!}
							</div>
						</label>
					</div>
					@endif

				</div>
				<div class="option answer-true-explanation">
					<p>Jawaban Benar : <strong><span class="answer_true" style="color: #444;"></span></strong></p>
					<div class="no-soal">
						<span class="glyphicon glyphicon-exclamation-sign"></span>
					</div>
					<div class="explanation">

					</div>
				</div>
			</div>
			@endforeach
		</div>
		<div class="center btn-action">
			<a href="#" class="mymodal selesai btn btn-default blue" data-target="modal-clues-ask" data-body="Apa anda yakin sudah selesai?" url-yes="" data-function="selesai()">Selesai</a>
			{{-- <button class="btn btn-default blue" onclick="selesai()">Selesai</button> --}}
			<button class="btn btn-default penjelasan" onclick="show_answer()">Lihat Penjelasan</button>
			<button class="btn btn-default blue suka" onclick="like()"><span class="glyphicon glyphicon-heart{{ $like == 0 ? '-empty' : ''}}"></span> Suka</button>
			<button class="btn btn-default red kembali">Kembali</button>
		</div>
	</div>
</div>





<style>

	.penjelasan, .suka{
		display: none;
	}

	.nilai{
		display: none;
		position: fixed;
		right: 50px;
		top: 80px;
		padding-bottom: 30px;
		background: url({{ asset('images/result.png') }});
	}

	.answer-true-explanation{
		opacity: 0;
		overflow: hidden;
		max-height: 0;
		transition: all 0.3s ease-in-out;
	}
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
	.soal-container .explanation,
	.soal-container .option{
		padding-left: 25px;
		padding-bottom: 5px;
	}
	.soal-container .radio p{
		color: #444;
	}
	.soal-container .editor-container p,
	.soal-container .explanation p{
		color: #444444;
		margin-bottom: 0;
	}
	.soal-container .no-soal{
		margin-right: 8px;
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



	.option [type="radio"]:not(:checked), .option [type="radio"]:checked {
		position: absolute;
		left: -9999px;
		visibility: hidden;
	}


	[type="radio"]:checked + label:before {
		padding-left: 7px;
		height: 23px;
		color: #fff;
		border-color: #d4d4d4;
		width: 23px;
		margin-top: 0px;
		border-radius: 50%;
		border: 2px solid transparent;
	}
	[type="radio"]:checked + label:after {
		color: #fff;
		padding-left: 7px;
		z-index: -100;
		height: 23px;
		width: 23px;
		background-color: #d4d4d4;
		margin-top: 0px;
		border-radius: 50%;
		border: 2px solid #5a5a5a;
		background-color: #d4d4d4;
		z-index: 0;
		-webkit-transform: scale(1.02);
		transform: scale(1.02);
	}



	[type="radio"]:not(:checked) + label:before {
		padding-left: 7px;
		height: 23px;
		width: 23px;
		background-color: transparent;
		border-color: #5a5a5a;
		margin-top: 0px;
		border-radius: 50%;
		border: 2px solid #5a5a5a;
	}
	
	[type="radio"]:not(:checked) + label:after {
		padding-left: 7px;
		height: 23px;
		width: 23px;
		background-color: transparent;
		margin-top: 0px;
		border-radius: 50%;
		border: 2px solid #5a5a5a;
		z-index: -1;
		-webkit-transform: scale(0);
		transform: scale(0);
	}


	[type="radio"]+label:before, [type="radio"]+label:after {
		content: '';
		position: absolute;
		left: 0;
		top: 0;
		margin: 0;
		width: 16px;
		height: 16px;
		z-index: 0;
		transition: .28s ease;
	}

	[type="radio"]+label.active:before {
		border: 2px solid #abd1ef;
		background-color: #f4bfbd;
	}
	[type="radio"]+label.active:after {
		border: 2px solid #f4bfbd;
		background-color: #abd1ef;
	}


	.radio{
		margin: 0;
	}
	.radio label{
		padding-top: 2px;
		padding-left: 7px;
	}
	.radio .option_question{
		padding-left: 27px;
	}

	/*custom css for embeded file*/
	.medium-editor-embeds.medium-editor-embeds-selected .medium-editor-embeds-overlay{
		background-color: transparent;
	}




</style>
<script>
	$(document).ready(function(){
		// declare custom function
		window.jumlahsoal = $('.soal').length;
		reordernomor();
		// delete_cookie('countdown_{{$questionset->id}}', cookie_time); 

		for (var i = 0; i < window.jumlahsoal; i++) {
			var id = $( ".soal:eq("+i+")").data('id');
			var question_set_id = '{{ $questionset->id}}';
			var user_id = '{{ Auth::user()->id}}';
			cek(id, question_set_id, user_id);	
		}


		window.cookie_countdown = $.cookie('countdown_{{$questionset->id}}');
		if (!$.cookie('countdown_{{$questionset->id}}')){
			var qtime = '{{ $questionset->time }}';
			var now = new Date(); 
			var timer = new Date(now.getTime() + (qtime * 60 * 1000));
			$.cookie('countdown_{{$questionset->id}}', timer);
		}
		window.cookie_countdown = $.cookie('countdown_{{$questionset->id}}');

		$('.countdown').countdown({
			layout: '{hnn}{sep}{mnn}{sep}{snn}',
			until: new Date(window.cookie_countdown),
			onExpiry: function(){
				selesai();
			}
			,format: 'HMS'
		});

		var time_now = new Date().getTime();
		var cookie_time = new Date($.cookie('countdown_{{$questionset->id}}')).getTime();
		if(cookie_time < time_now){
			delete_cookie('countdown_{{$questionset->id}}', cookie_time); 
			window.location.href = "{{ url('') }}";
		}


		$('.option input[type="radio"]').click(function(e) {
			var jwb = $(this).val();
			var id = $(this).parents('.soal').data('id');
			var data = {
				question_id: id,
				question_set_id: '{{ $questionset->id}}',
				user_id: '{{ Auth::user()->id }}',
				answer: jwb,
				_token: '{{ csrf_token() }}'
			};
			$.ajax({
				data: data,
				url: '{{ url('result') }}',
				type: 'POST',
				success: function(result){
					if (result != 'oke') {
						$(this).prop('checked', false);
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

	function selesai(){
		var question_set_id = '{{ $questionset->id }}';
		var user_id = '{{ Auth::user()->id }}';
		var jumlsoal = parseInt(window.jumlahsoal);
		var data = {
			jml_soal: jumlsoal,
			user_id: user_id,
			question_set_id: question_set_id,
			_token: '{{ csrf_token() }}'
		}
		$.ajax({
			data: data,
			url: '{{ url('getresultexam') }}',
			type: 'POST',
			success: function(result){
				// var nilai = parseInt(100);
				// var resultexam = parseInt(result);
				// var jumlsoal = parseInt(window.jumlahsoal);
				// var total_nilai = resultexam/jumlsoal*nilai;
				// console.log(total_nilai);
				$('.selesai').hide();
				$('.penjelasan').css('display', 'inline-block');
				$('.suka').css('display', 'inline-block');
				$('.nilai').css('display', 'block');
				$('.result').html(result);
				delete_cookie('countdown_{{$questionset->id}}', window.cookie_countdown); 
				$('.countdown').countdown('destroy',{ until: new Date(window.cookie_countdown)});
				$('.countdown').append('00:00:00');
				$('input[type="radio"]').prop('disabled', true);
			},
			beforeSend: function(){
				$('.bar-container').css('visibility', 'visible');
			},
			complete: function(){
				$('.bar-container').css('visibility', 'hidden');
			}
		})
	}

	function reordernomor(){
		$('.jmlsoal').html(window.jumlahsoal);
		for (var i = 0; i < window.jumlahsoal; i++) {
			$( ".nomor:eq("+i+")" ).text(i+1);
			var nmr = i+1;
			$('.soal:eq('+i+')').find('.radio:eq(0) input').attr('id', 'A_'+nmr+'');
			$('.soal:eq('+i+')').find('.radio:eq(1) input').attr('id', 'B_'+nmr+'');
			$('.soal:eq('+i+')').find('.radio:eq(2) input').attr('id', 'C_'+nmr+'');
			$('.soal:eq('+i+')').find('.radio:eq(3) input').attr('id', 'D_'+nmr+'');
			$('.soal:eq('+i+')').find('.radio:eq(4) input').attr('id', 'E_'+nmr+'');

			$('.soal:eq('+i+')').find('.radio:eq(0) label').attr('for', 'A_'+nmr+'');
			$('.soal:eq('+i+')').find('.radio:eq(1) label').attr('for', 'B_'+nmr+'');
			$('.soal:eq('+i+')').find('.radio:eq(2) label').attr('for', 'C_'+nmr+'');
			$('.soal:eq('+i+')').find('.radio:eq(3) label').attr('for', 'D_'+nmr+'');
			$('.soal:eq('+i+')').find('.radio:eq(4) label').attr('for', 'E_'+nmr+'');

		}
	}

	function cek(id, question_set_id, user_id){
		$.ajax({
			url: '{{ url('getdataexam') }}'+'/'+id+'/'+question_set_id+'/'+user_id,
			type: 'GET',
			success: function(result){
				$('.soal[data-id="'+id+'"]').find('input[type="radio"][value="'+result+'"]').prop('checked', true);

			},
			beforeSend: function(){
				$('.bar-container').css('visibility', 'visible');
			},
			complete: function(){
				$('.bar-container').css('visibility', 'hidden');
			}
		})

	}

	function show_answer(){
		for (var i = 0; i < window.jumlahsoal; i++) {
			var id = $( ".soal:eq("+i+")").data('id');
			show_answer_true(id);	
		}
	}

	function show_answer_true(id, question_set_id, user_id){
		$.ajax({
			url: '{{ url('showanswertrue') }}'+'/'+id,
			type: 'GET',
			success: function(result){
				$('.soal[data-id="'+id+'"]').find('.answer-true-explanation').css({
					'min-height': '0px',
					'max-height': '1000px',
					'opacity': '1',
					'overflow': 'scroll'
				});

				$('.soal[data-id="'+id+'"]').find('input[name="'+id+'"][value="'+result.answer_true+'"]:not(:checked) + label').addClass('active');
				$('.soal[data-id="'+id+'"]').find('input[name="'+id+'"][value="'+result.answer_true+'"]:checked + label').addClass('active');

				$('.soal[data-id="'+id+'"]').find('.answer_true').text(result.answer_true);
				$('.soal[data-id="'+id+'"]').find('.explanation').html(result.explanation);
			}
		})
	}

	function delete_cookie(name, value){
		$.cookie(name, value, { expires: -1});
	}

	function like(){
		var question_set_id = '{{ $questionset->id }}';
		var user_id = {{ $questionset->user_id }};
		var data = {
			user_id: user_id,
			question_set_id: question_set_id,
			_token: '{{ csrf_token() }}'
		}
		$.ajax({
			data: data,
			url: '{{ url('like') }}',
			type: 'POST',
			success: function(){
				if ($('.suka span').hasClass('glyphicon-heart') == true) {
					$('.suka span').removeClass('glyphicon-heart');
					$('.suka span').addClass('glyphicon-heart-empty');
				}else if($('.suka span').hasClass('glyphicon-heart-empty') == true){
					$('.suka span').removeClass('glyphicon-heart-empty');
					$('.suka span').addClass('glyphicon-heart');
				}
			},
			beforeSend: function(){
				$('.bar-container').css('visibility', 'visible');
			},
			complete: function(){
				$('.bar-container').css('visibility', 'hidden');
			}
		})
	}

</script>



@endsection