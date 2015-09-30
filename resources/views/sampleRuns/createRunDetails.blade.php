@extends('app')
@section('content')
@include('partials.navbar')
{!! Form::open(['url'=>'runDetails', 'class'=>'form-inline']) !!}
@include('partials.runsForm', ['submitButtonText'=>'Submit'])
{!! Form::close() !!}
@include('errors.list')

<br/>
<h3>Selected batches</h3>
<div class="table-container">
<table class="table table-striped">

    <tr>
        <th>Batch Name</th>
        <th>Project Group</th>
        <th>Number Samples</th>
    </tr>

    @foreach ($batches as $batch)
    <tr>
        <td>{{($batch->batch_name)}}</td>
        <td>{{($batch->project_group->name)}}</td>
        <td>{{count($batch->samples)}}</td>
    </tr>
    @endforeach

</table>
</div>
@endsection

@section('footer')
@endsection

