<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Inventory - Aplikasi inventory barang</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!};
        </script>
    </head>
    <style>
        @font-face {
            font-family: ubuntu;
            src: url({{ asset('font/Ubuntu/Ubuntu-Regular.ttf') }});
        }
        body{
            background-image: url({{ asset('images/Sativa.jpg') }});
            /*background-color: #F2F2F0;*/
            color: #737371;
            font-family: ubuntu;
        }
        h1, h2, h3, h4, h5{
            color: #737371;
            margin: 0;
        }
        a{
            color: #737371;
        }
        a:hover{
            color: #737371;
        }
        header{
            margin-bottom: 20px;
            border-bottom: 4px solid #DE6262;
            padding: 15px 0; 
        }
        header h1{
            margin: 0;
        }
        .container-fluid{
            padding-left: 330px;
        }
        .sidebar{
            position: fixed;
            height: 100%;
            width: 300px;
            border-right: 1px solid #555;
        }
        .footer{
            position: absolute;
            bottom: 0;
        }
    </style>
    <body>
        <header class="tautara">
            <h1 class="seashell-txt center"><a href="{{ url('login') }}">Inventory</a></h1>
        </header>
        @yield('content')
        @include('elements.footer')
        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    </body>
    </html>













    