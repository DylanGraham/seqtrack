@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
        @endforeach
    </ul>
@endif
