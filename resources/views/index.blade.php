@extends('app')
@section('content')
@include('partials.logo')
    <hr/>
    <a href="{!! route('batches.create') !!}">Create batch</a><br>
    <a href="{!! route('batches.index') !!}">View batches</a><br><br>
    <a href="{!! route('samples.create') !!}">Create sample</a><br>
    <a href="{!! route('samples.index') !!}">View Samples</a><br><br>
    <a href="{!! route('runs.index') !!}">View runs</a><br>
    <a href="{!! route('runs.create') !!}">Create run</a><br>
    @include('errors.list')

@endsection

