<!DOCTYPE html>
<html>
<head>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ url('css/themes/beagle.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/modal-clues.css') }}">
	<link rel="stylesheet" href="{{ url('css/header-clues.css') }}">
	<link rel="stylesheet" href="{{ url('css/medium-editor.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/medium-editor-embed-button.css') }}">
	{{-- <link rel="stylesheet" href="{{ url('css/medium-editor-insert-plugin.css') }}"> --}}
	<link href="{{ asset('css/tagmanager.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	<!-- Scripts -->
	<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
	<script src="{{ asset('js/tagmanager.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/myjs.js') }}"></script>
	<script src="{{ asset('js/modal-clues.js') }}"></script>
	<script src="{{ asset('js/header-clues.js') }}"></script>
	<script src="{{ asset('js/pinterest-grid.js') }}"></script>
	
	<script src="{{ asset('js/medium-editor.min.js') }}"></script>
	<script src="{{ asset('js/medium-editor-embed-button.min.js') }}"></script>
	<script src="{{ asset('js/jquery.iframe-transport.js') }}"></script>
    {{-- <script src="{{ asset('js/handlebars.runtime.min.js') }}"></script>
    <script src="{{ asset('js/jquery-sortable-min.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('js/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('js/jquery.cycle2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.cycle2.center.min.js') }}"></script>
    <script src="{{ asset('js/medium-editor-insert-plugin.min.js') }}"></script>
    --}}

    <script src="{{ asset('js/jQuery.print.js') }}"></script>
    <script src="{{ asset('js/infinite-scroll.pkgd.min.js') }}"></script>
</head>
<body>
	@yield('content')
</body>
</html>