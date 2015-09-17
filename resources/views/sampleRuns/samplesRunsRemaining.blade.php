@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a>
    <br/><br/>
    <h4>List of all samples with runs remaining</h4>
    <br/>
    <table class="table table-striped">
    <thead>
    <tr>
        <th>Batch id</th>
        <th>Batch name</th>
        <th>Sample Id</th>
        <th>Runs Remaining</th>
        <th>Users Id</th>

    </tr>
    </thead>

    @foreach($batches as $batch)

        <tr>
            <td> {{ ($batch->batch_id)}}     </td>
            <td> {{ ($batch->batch_name) }}  </td>
            <td> {{ $batch->sample_id }}     </td>
            <td> {{ $batch->runs_remaining}} </td>
            <td> {{ ($batch->name)}}    </td>
        </tr>

    @endforeach

</table>

    @include('errors.list')

@endsection

@section('footer')

@endsection
