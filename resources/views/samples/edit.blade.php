@extends('app')
@section('content')
    <h1><a href='/'>SeqTrack</a> - Edit sample - {{ $sample->sample_id }}</h1>
    <hr/>

    {!! Form::model($sample, ['method'=>'PATCH', 'action'=>['SamplesController@update', $sample->id], 'class'=>'form-inline']) !!}

    @include('partials.form', ['submitButtonText'=>'Update'])

    {!! Form::close() !!}

   @include('errors.list') 

@endsection

@section('footer')
    @include('partials.js')
@endsection

@stop
