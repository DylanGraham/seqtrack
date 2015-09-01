@extends('app')
@section('content')
    <h1>SeqTrack</h1>
    <hr/>
    <a href="{!! route('samples.index') !!}">View Samples</a><br>
    <a href="{!! route('samples.create') !!}">Enter samples</a><br>
    <a href="{!! route('batches.index') !!}">View batches</a><br>
    <a href="{!! route('runs.create') !!}">Enter runs</a><br>
    @include('errors.list')

@endsection

