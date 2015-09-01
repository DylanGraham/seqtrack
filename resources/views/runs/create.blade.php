@extends('app')
@section('content')
    <h1><a href='/'>SeqTrack</a> - Enter runs</h1>
    <hr/>

    {!! Form::open(['url'=>'runs', 'class'=>'form-inline']) !!}
       @include('partials.runsForm', ['submitButtonText'=>'Submit'])
    {!! Form::close() !!}
    @include('errors.list')

@endsection

@section('footer')

@endsection
