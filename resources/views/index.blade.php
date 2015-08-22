@extends('app')
@section('content')
    <h1>SeqTrack</h1>
    <hr/>
    <a href="{!! route('samples.index') !!}">View Samples</a><br>
    <a href="/samples/create">Enter samples</a><br>
    <a href="/batches">View batches</a><br>

    @include('errors.list')

@endsection

