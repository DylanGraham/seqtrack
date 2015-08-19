<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <meta charset="utf-8">
        <title>SeqTrack</title>
    </head>
    <body>
        @if (Session::has('flash_message'))
            <div class="alert alert-danger">
                {{ session('flash_message') }}
            </div>
        @endif

        <div class="content">
            @yield('content')
        </div>
 
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script>
            $('div.alert').delay(2000).slideUp('slow');
        </script>

       <div class="footer">
            @yield('footer')
        </div>

    </body>
</html>

