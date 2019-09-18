<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       
    @if(!auth()->guest())
        <script type="text/javascript">
            window.username = {!! json_encode(auth()->user()->username) !!};
        </script>
    @endif

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">    
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

        @guest
            @include('navbars.guestnav')   
        @else
            @if (Auth::user()->position=="Coach")
                @include('navbars.coachnav')
            @else
                @include('navbars.usernav')
            @endif
        @endguest
        
        <main>
            @yield('content')
        </main>

    </div>
    <script>
        $(".alert-success").fadeTo(2000,500).slideUp(500,function(){
            $(".alert-success").slideUp(500);
        });
        $(".alert-danger").fadeTo(2000,500).slideUp(500,function(){
            $(".alert-danger").slideUp(500);
        });
    </script>
</body>
</html>
