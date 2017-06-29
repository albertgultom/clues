<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>CLUES - APLIKASI TRY OUT GRATIS</title>
    

    
    <!-- Styles -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito|Oxygen" rel="stylesheet"> --}}
    <script src="{{ asset('js/medium-editor.min.js') }}"></script>

    
    <link rel="stylesheet" href="{{ url('css/select2.min.css') }}">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/themes/beagle.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/medium-editor.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/modal-clues.css') }}">
    <link rel="stylesheet" href="{{ url('css/header-clues.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/myjs.js') }}"></script>
    <script src="{{ asset('js/modal-clues.js') }}"></script>
    <script src="{{ asset('js/header-clues.js') }}"></script>


</head>
<body>
    @include ('elements.header')

    <div class="container">
        @yield('content')
    </div>

    <!-- The Modal -->
    <div id="modal-clues" class="modal-clues">
        <!-- Modal content -->
        <div class="modal-content-clues">
            <span class="close">&times;</span>
            <div class="modal-header-clues">

            </div>
            <div class="modal-body-clues">
            </div>
        </div>
        <div class="loader"></div>
    </div>

</body>

</html>
{{-- loader css --}}
<style>
    .loader {
        position: fixed;
        top: 30%;
        right: 0;
        left: 0;
        display: none;
        border: 8px solid #f3f3f3; /* Light grey */
        border-top: 8px solid #555; 
        border-radius: 50%;
        width: 60px;
        height: 60px;
        margin: 10px auto;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
{{-- loader js --}}
<script>
    $(document).ajaxStart(function(){
        $(".loader").css("display", "block");
    });

    $(document).ajaxComplete(function(){
        $(".loader").css("display", "none");
    });
</script>
