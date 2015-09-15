<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <meta charset="utf-8">
        <title>SeqTrack</title>
    </head>
    <body>
        @if (Session::has('flash_message'))
            <div class="alert alert-danger">
                {{ session('flash_message') }}
            </div>
        @endif
        @if (Session::has('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif
        
        <div class="content">
            @yield('content')
        </div>
 
        <script src="{{ asset('js/all.js') }}"></script>

        <div class="footer">
            @yield('footer')
        </div>

    </body>
</html>

