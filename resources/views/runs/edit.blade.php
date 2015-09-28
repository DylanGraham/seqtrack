@extends('app')
@section('content')
@include('partials.navbar')
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

    <p>Where run status is either 'Run built' or 'Run succeed' and it is set to 'Run failed' all included samples will have runs remaining incremented by 1 </p>
    @include('errors.list')
<h4>Included batches</h4>


<div class="table-container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Batch name</th>
            <th>User ID</th>
            <th>Charge code</th>
            <th>Date</th>
            <th>Project</th>
        </tr>
        </thead>
        @foreach ($batches as $b)
            <tr>
                <td><a href="/batches/{{ $b->id }}">{{ $b->batch_name }}</a></td>
                <td>{{ $b->name}}</td>
                <td>{{ $b->charge_code}}</td>
                <td>{{Carbon\Carbon::parse($b->created_at)->format('d M Y') }}</td>
                <td>{{ $b->project}}</td>
            </tr>
        @endforeach
    </table>
</div>

@endsection
