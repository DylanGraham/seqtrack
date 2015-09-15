@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a> 
    <h4>Batches</h4>
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
        <td><a href="/batches/{{ $b->id }}/edit">{{ $b->batch_name }}</a></td>
        <td>{{ $b->user_id}}</td>
        <td>{{ $b->charge_code}}</td>
        <td>{{ $b->concentration}}</td>
        <td>{{ $b->volume}}</td>
        <td>{{ $b->created_at}}</td>
        <td>{{ $b->tube_bar_code}}</td>
        <td>{{ $b->tube_location}}</td>
        <td>{{ $b->tape_station_length}}</td>
        <td>{{ $b->project_group->name}}</td>
    </tr>
    @endforeach
    </table>
@endsection
