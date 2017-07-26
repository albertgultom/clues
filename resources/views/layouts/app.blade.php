<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <link rel="icon" type="image/png" href="{{ asset('img/clues-logo.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - Aplikasi membuat soal dan latihan dengan mudah</title>
    <meta name="author" content="Clues">
    <meta name="description" content="Clues dibuat untuk memudahkan kamu membuat soal dan latihan dengan cara baru">
    

    

    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/themes/beagle.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/modal-clues.css') }}">
    <link rel="stylesheet" href="{{ url('css/header-clues.css') }}">
    <link rel="stylesheet" href="{{ url('css/medium-editor.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/medium-editor-embed-button.css') }}">
    <link href="{{ asset('css/tagmanager.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/tagmanager.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/myjs.js') }}"></script>
    <script src="{{ asset('js/modal-clues.js') }}"></script>
    <script src="{{ asset('js/header-clues.js') }}"></script>
    <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>

    
    <script src="{{ asset('js/medium-editor.min.js') }}"></script>
    <script src="{{ asset('js/medium-editor-embed-button.min.js') }}"></script>
    <script src="{{ asset('js/jquery.iframe-transport.js') }}"></script>
    

    <script src="{{ asset('js/jQuery.print.js') }}"></script>
    <script src="{{ asset('js/infinite-scroll.pkgd.min.js') }}"></script>


    {{-- GOOGLE ANALYTIC --}}
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-103217098-1', 'auto');
      ga('send', 'pageview');
  </script>



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

    <div class="bodyy">
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
        z-index: 100;
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
<script>$.ajaxPrefilter(function( options, originalOptions, jqXHR ) { options.async = true; });</script>


