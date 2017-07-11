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
    <script src="{{ asset('js/radialIndicator.min.js') }}"></script>
    <script src="{{ asset('js/myjs.js') }}"></script>
    <script src="{{ asset('js/modal-clues.js') }}"></script>
    <script src="{{ asset('js/header-clues.js') }}"></script>
    <script src="{{ asset('js/pinterest-grid.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mathjax/MathJax.js?config=TeX-AMS_HTML') }}"></script>


</head>
<body>
    <div class="bar-container">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    @include ('elements.header')
   {{--  @foreach ($notif as $element)
    {{$element->id}}
    @endforeach --}}
    {{-- <h1>{{$id}}</h1> --}}

    <div class="container bodyy">
        @yield('content')
    </div>

    @include ('elements.footer')


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
    </div>

    <div id="modal-clues-ask" class="modal-clues-ask">
        <!-- Modal content -->
        <div class="modal-content-clues">
            <span class="close">&times;</span>
            <div class="modal-body-clues">

            </div>
            <div class="option">
                <a class="btn btn-default blue">
                    Ya
                </a>
                <a class="btn btn-default red">
                    Tidak
                </a>
            </div>
        </div>
    </div>


</body>

</html>
{{-- loader css --}}
<style>
    /* linear loading */
    .bar-container{
        visibility: hidden;
        position: fixed;
        top: 0;
        height: 5px;
        width: 100%;
        background-color: #bdbdbd;
    }

    .bar{
        content: "";
        display: inline;
        position: absolute;
        height: 100%;
        width: 0;
        right: 0;
    }

    .bar:nth-child(1) {
        background-color: #dd7a78;
        animation: linear_loader 3s linear 1s infinite;
    }

    .bar:nth-child(2) {
        background-color: #0E5C9A;
        animation: linear_loader 3s linear 2s infinite;
    }

    .bar:nth-child(3) {
        background-color: #555555;
        animation: linear_loader 3s linear 3s infinite;
    }

    @keyframes linear_loader {
        0% {
            right: 100%; 
            width: 10%;
        }
        30% {
            right: 0%; 
            width: 40%;
        }
        50% {
            right: 0%; 
            width: 0%;
        }
        80% {
            right: 0%; 
            width: 0%;
        }
        100% {
            right: 0%; 
            width: 0%;
        }
    }
    /* end linear loading */

</style>
{{-- loader js --}}

