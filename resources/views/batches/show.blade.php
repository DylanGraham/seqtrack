@extends('app')
@section('content')
    @include('partials.navbar')
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
                <td>{{ $batch->user->user_id}}</td>
                <td>{{ $batch->charge_code}}</td>
                <td>{{ $batch->concentration}}</td>
                <td>{{ $batch->volume}}</td>
                <td>{{ Carbon\Carbon::parse($batch->created_at)->format('d M Y')}}</td>
                <td>{{ $batch->tube_bar_code}}</td>
                <td>{{ $batch->tube_location}}</td>
                <td>{{ $batch->tape_station_length}}</td>
                <td>{{ $batch->project_group->name}}</td>
                <td><a href="/batches/{{ $batch->id }}/edit">
                        <button>Edit</button>
                    </a></td>
            </tr>
        </table>
    </div>

    <div class="table-container">
        <h3>Samples</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Sample name</th>
                <th>i7 index</th>
                <th>i5 index</th>
                <th>Description</th>
                <th>Plate</th>
                <th>Well</th>
                <th>Runs Remaining</th>
            </tr>
            </thead>
            @foreach ($batch->samples as $s)
                <tr>
                    <td><a href="/samples/{{ $s->id }}/edit">{{ $s->sample_id }}</a></td>
                    <td>{{ $s->i7_index['index']." / ". $s->i7_index['sequence']}}</td>
                    <td>{{ $s->i5_index['index']." / ". $s->i5_index['sequence'] }}</td>
                    <td>{{ $s->description }}</td>
                    <td>{{ $s->plate}}</td>
                    <td>{{ $s->well }}</td>
                    <td>{{ $s->runs_remaining}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
