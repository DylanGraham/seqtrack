@extends('app')
@section('content')
    {!! Html::image('images/logo.png', null, ['width'=>'30%', 'height'=>'30%']) !!}
    <hr/>
    <a href="{!! route('samples.index') !!}">View Samples</a><br>
    <a href="{!! route('samples.create') !!}">Enter samples</a><br>
    <a href="{!! route('batches.index') !!}">View batches</a><br>
    <a href="{!! route('runs.create') !!}">Enter runs</a><br>
    @include('errors.list')

@endsection

