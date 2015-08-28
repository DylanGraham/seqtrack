@extends('app')
@section('content')
    <h1><a href='/'>SeqTrack</a> - Enter samples</h1>
    <hr/>

    {!! Form::open(['url'=>'samples', 'class'=>'form-inline']) !!}

    @include('partials.form', ['submitButtonText'=>'Submit'])

    {!! Form::close() !!}

    @include('errors.list')

@endsection

@section('footer')
    @include('partials.js')
@endsection
