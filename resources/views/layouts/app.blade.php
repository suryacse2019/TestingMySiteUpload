<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <script src="{{asset('assets/css/app.js')}}"></script>
  
    <!-- Styles -->
</head>
<body>
    <div id="app">
      
       <header class="main-nav">
                @include('layouts.navbar')
            </header>

            
        <main class="py-4">
            @yield('content')
        </main>

        @stack('script')
        
    </div>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
