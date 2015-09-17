@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a>
    <h4>Samples</h4>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Description</th>
            <th>Sample name</th>
            <th>i7 index</th>
            <th>i5 index</th>
            <th>Plate</th>
            <th>Well</th>
            <th>Instrument Lane</th>
            <th>Runs Remaining</th>
            <th>Created At</th>
            <th>Batch Name</th>
        </tr>
    </thead>
    @foreach ($samples as $s)
    <tr>
        <td>{{ $s->description }}</td>
        <td><a href="/samples/{{ $s->id }}/edit">{{ $s->sample_id }}</a></td>
        <td>{{ $s->i7_index['index'] }}</td>
        <td>{{ $s->i5_index['index'] }}</td>
        <td>{{ $s->plate}}</td>
        <td>{{ $s->well }}</td>
        <td>{{ $s->instrument_lane}}</td>
        <td>{{ $s->runs_remaining}}</td>
        <td>{{ $s->created_at}}</td>
        <td>{{ $s->batch['batch_name']}}</td>
    </tr>
    @endforeach
    </table>
@endsection
