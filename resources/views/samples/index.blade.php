@extends('app')
@section('content')
    <a href='/'>@include('partials.logo')</a>
    <h4>Samples</h4>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>BASC Project</th>
            <th>Sample name</th>
            <th>i7 index</th>
            <th>i5 index</th>
        </tr>
    </thead>
    @foreach ($samples as $s)
    <tr>
        <td>{{ $s->basc_group_id }}</td>
        <td><a href="/samples/{{ $s->id }}/edit">{{ $s->sample_id }}</a></td>
        <td>{{ $s->i7_index_id }}</td>
        <td>{{ $s->i5_index_id }}</td>
    </tr>
    @endforeach
    </table>
@endsection
