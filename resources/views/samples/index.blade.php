@extends('app')
@section('content')
@include('partials.navbar')
    <h1>Samples</h1>
    <div class ="table-container">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Sample name</th>
            <th>i7 index</th>
            <th>i5 index</th>
            <th>Description</th>
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
        <td><a href="/samples/{{ $s->id }}/edit">{{ $s->sample_id }}</a></td>
        <td>{{ $s->i7_index['index'] }}</td>
        <td>{{ $s->i5_index['index'] }}</td>
        <td>{{ $s->description }}</td>
        <td>{{ $s->plate}}</td>
        <td>{{ $s->well }}</td>
        <td>{{ $s->instrument_lane}}</td>
        <td>{{ $s->runs_remaining}}</td>
        <td>{{ Carbon\Carbon::parse($s->created_at)->format('d M Y')}}</td>
        <td>{{ $s->batch['batch_name']}}</td>
    </tr>
    @endforeach
    </table>
    </div>
@endsection
