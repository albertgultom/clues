@extends('layouts.app')

@section('content')
<div class="container">
	<div class="container">
		@if ($keyword != '')
		<h3 class="center">Hasil pencarian "{{ $keyword }}"</h3>
		<br>
		@endif
		@if ($users->count() == '' && $postedquestion->count() == '')
		<div class="divider"></div>
		<p class="center">Pencarian dengan kata kunci "{{$keyword}}" tidak ditemukan.</p>
		@endif

		@if ($users->count() > 0)
		<div class="row">
			@include('partials.user')
		</div>
		<br>
		@endif
		@if ($postedquestion->count() > 0)
		<div class="row">
			@include('partials.questionset')
		</div>
		@endif
	</div>
</div>

@endsection