@extends('app')
@section('content')
@include('partials.navbar')
<h3>Runs</h3>
    <div class="table-container">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Run id</th>
            <th>Experiment name</th>
            <th>Description</th>
            <th>Flow Cell</th>
            <th>Date</th>
            <th>Status</th>
            <th>Instrument</th>



        </tr>
    </thead>
    @foreach ($runs as $run)
    <tr>
      <td><a href="/runs/{{ $run->id }}/edit">{{ $run->id }}</a></td>

        <td>{{ $run->experiment_name}}</td>
        <td>{{ $run->description}}</td>
        <td>{{ $run->flow_cell}}</td>
        <td>{{ Carbon\Carbon::parse($run->run_date)->format('d M Y')}}</td>
        <td>{{ $run->run_status->status}}</td>
        <td>{{ $run->instrument->name}}</td>


    </tr>
    @endforeach

    </table>
    </div>
@endsection
