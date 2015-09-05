@extends('app')
@section('content')
    <a href='/'>@include('partials.logo')</a>
    {!! Form::open(['url'=>'runs', 'class'=>'form-inline']) !!}
    <br/>
    <p>Add batches to a run</p>
    <br/>
    <p> Select run
    @include('partials.runSelect')


    or <a href="{!! route('runs.create') !!}"> create a new run</a></p>

    <hr/>
    <h1>List of batches with samples that have runs remaining</h1>

    <table class="table table-striped">
    <thead>
    <tr>
        <th>Batch id</th>
        <th>Batch name</th>
        <th>Number of samples with Runs Remaining</th>
        <th>Max Runs Remaining for a sample</th>

    </tr>
    </thead>

    @foreach($batches as $batch)

        <tr>
            <td> {{ ($batch->id)}}    </td>
            <td> {{ ($batch->batch_name)}}    </td>
            <td> {{ ($batch->num_samples)}}    </td>
            <td> {{ ($batch->max_runs)}}    </td>
        </tr>

    @endforeach

</table>

    {!! Form::close() !!}
    @include('errors.list')

@endsection

@section('footer')

@endsection
