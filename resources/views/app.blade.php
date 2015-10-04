<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/all.css') }}">
        <meta charset="utf-8">
        <title>SeqTrack</title>
    </head>
    <body>
       <div class="content">
            @yield('content')
        </div>

        @if (Session::has('flash_message'))
            <div class="alert alert-danger center-block">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ session('flash_message') }}
            </div>
        @endif
        @if (Session::has('success_message'))
            <div class="alert alert-success">
                {{ session('success_message') }}
            </div>
        @endif

        <script src="{{ asset('js/all.js') }}"></script>

        <div class="footer">
            @yield('footer')
        </div>

    </body>
</html>

