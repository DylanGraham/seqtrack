@extends('app')
@section('content')
@include('partials.navbar')
    <div class="container-fluid">
    <a href='/'>@include('partials.logo')</a>
@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a>

    {{--{!! Form::open(['url'=>'sampleRuns/runSave', 'class'=>'form-inline']) !!}--}}
       {{--@include('partials.runsForm', ['submitButtonText'=>'Submit'])--}}
    {{--{!! Form::close() !!}--}}
    {{--@include('errorBag.list')--}}

    {{--<br/>--}}
    {{--<h3>Selected batches</h3>--}}

    {{--<table class="table table-striped">--}}

        {{--<tr>--}}
            {{--<th>Batch Name</th>--}}
            {{--<th>Project Group</th>--}}
            {{--<th>Number Samples</th>--}}
        {{--</tr>--}}

    {{--@foreach ($batches as $batch)--}}
        {{--<tr>--}}
            {{--<td>{{($batch->batch_name)}}</td>--}}
            {{--<td>{{($batch->project_group->name)}}</td>--}}
            {{--<td>{{count($batch->samples)}}</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}

    {{--</table>--}}

    {{--@include('errorBag.list')--}}
{{--@endsection--}}

{{--@section('footer')--}}

{{--@endsection--}}
    </div>
