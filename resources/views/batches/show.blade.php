@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a> 
    <h4>{{ $batch->batch_name }}</h4>
    <div class="table-container">
    <table class="table table-striped">
    <thead>
        <tr>
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
    <tr>
        <td>{{ $batch->user_id}}</td>
        <td>{{ $batch->charge_code}}</td>
        <td>{{ $batch->concentration}}</td>
        <td>{{ $batch->volume}}</td>
        <td>{{ $batch->created_at}}</td>
        <td>{{ $batch->tube_bar_code}}</td>
        <td>{{ $batch->tube_location}}</td>
        <td>{{ $batch->tape_station_length}}</td>
        <td>{{ $batch->project_group->name}}</td>
        <td><a href="/batches/{{ $batch->id }}/edit"><button>Edit</button></a></td>
    </tr>
    </table>
    </div>
@endsection
