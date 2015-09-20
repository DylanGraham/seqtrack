@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a>
    <div class="table-container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Run id</th>
            <th>Experiment name</th>
            <th>Read 1</th>
            <th>Read 2</th>
            <th>Description</th>
            <th>Flow Cell</th>
            <th>Date</th>
            <th>Status</th>
            <th>Adaptor</th>
            <th>Chemistry</th>
            <th>Project</th>
            <th>User</th>

            <th>Assay</th>
            <th>Instrument</th>
            <th>Work Flow</th>

        </tr>
        </thead>

            <tr>
                <td>{{ $run->id }}</td>

                <td>{{ $run->experiment_name}}</td>
                <td>{{ $run->read1}}</td>
                <td>{{ $run->read2}}</td>
                <td>{{ $run->description}}</td>
                <td>{{ $run->flow_cell}}</td>
                <td>{{ $run->run_date}}</td>
                <td>{{ $run->run_status->status}}</td>
                <td>{{ $run->adaptor->value}}</td>
                <td>{{ $run->chemistry->chemistry}}</td>
                <td>{{ $run->project_group->name}}</td>
                <td>{{ $run->users->name}}</td>

                <td>{{ $run->assay->name}}</td>
                <td>{{ $run->instrument->name}}</td>
                <td>{{ $run->work_flow->value}}</td>

            </tr>

    </table>
    </div>
    {!! Form::open(['url'=>'runs/setStatus', 'class'=>'form-inline']) !!}
    {!! Form::hidden('run_id',$run->id) !!}
    {!! Form::label('run_status', 'run_status', ['class'=>'sr-only']) !!}
    {!! Form::select('run_status', $status_options, null, ['class'=>'form-control']) !!}

    {!! Form::submit("Set status", ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}

    <br><br>

    <p>Where run status is either 'Run built' or 'Run succeded' and it is set to 'Run failed' all included samples will have runs remaining incremented by 1 </p>
    @include('errors.list')

@endsection