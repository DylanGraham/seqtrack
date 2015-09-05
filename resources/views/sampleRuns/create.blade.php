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
    <table class="table table-striped">
    <thead>
    <tr>
        <th>Batch id</th>
        <th>Batch name</th>
        <th>Sample Id</th>
        <th>Runs Remaining</th>

    </tr>
    </thead>

    @foreach($batches as $batch)

        <tr>
            <td> {{ ($batch->batch_id)}}     </td>
            <td> {{ ($batch->batch_name) }}  </td>
            <td> {{ $batch->sample_id }}     </td>
            <td> {{ $batch->runs_remaining}} </td>
        </tr>

    @endforeach

</table>

    {!! Form::close() !!}
    @include('errors.list')

@endsection

@section('footer')

@endsection
