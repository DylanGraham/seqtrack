@extends('app')
@section('content')
@include('partials.logo')<br><br>
    <a href="{!! route('batches.create') !!}">Create batch</a><br>
    <a href="{!! route('batches.index') !!}">View batches</a><br><br>
    <a href="{!! route('samples.create') !!}">Create sample</a><br>
    <a href="{!! route('samples.index') !!}">View samples</a><br><br>
    <a href="{!! route('runs.create') !!}">Create run</a><br>
    <a href="{!! route('runs.index') !!}">View runs</a><br>
    <a href="{!! route('sampleRuns.create') !!}">Add Batches to run</a><br>


<h2>Temporary pages</h2>
<a href="./batchesRunsRemaining" >View batches with runs remaining</a><br>
<a href="./samplesRunsRemaining" >View samples with runs remaining</a><br>


    @include('errors.list')

@endsection

