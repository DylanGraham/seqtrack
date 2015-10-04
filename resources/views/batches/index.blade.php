@extends('app')
@section('content')
@include('partials.navbar')
    <h3>Batches</h3>
    <div class="table-container">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Batch name</th>
            <th>User ID</th>
            <th>Charge code</th>
            <th>Concentration</th>
            <th>Volume</th>
            <th>Date</th>
            <th>Tube bar code</th>
            <th>Tube location</th>
            <th>Tape station length</th>
            <th>Project group</th>
        </tr>
    </thead>
    @foreach ($batches as $b)
    <tr>
        <td><a href="/batches/{{ $b->id }}">{{ $b->batch_name }}</a></td>
        <td>{{ $b->user->user_id}}</td>
        <td>{{ $b->charge_code}}</td>
        <td>{{ $b->concentration}}</td>
        <td>{{ $b->volume}}</td>
        <td>{{Carbon\Carbon::parse($b->created_at)->format('d M Y') }}</td>
        <td>{{ $b->tube_bar_code}}</td>
        <td>{{ $b->tube_location}}</td>
        <td>{{ $b->tape_station_length}}</td>
        <td>{{ $b->project_group->name}}</td>
        <td><a href="/batches/{{ $b->id }}/edit"><button>Edit</button></a></td>
    </tr>
    @endforeach
    </table>
    </div>
@endsection
