@if (Auth::check())
    <h4 class="text-right"><a href="/auth/logout">Logout</a></h4>
@else
    <h4 class="text-right"><a href="/auth/login">Login</a></h4>
@endif
