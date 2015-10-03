@extends('app')
@section('content')
@include('partials.navbar')

    <h1> {{ $sample->sample_id }}</h1>

    {!! Form::model($sample, ['method'=>'PATCH', 'action'=>['SamplesController@update', $sample->id], 'class'=>'form-inline']) !!}

    @include('partials.sample', ['formName'=>'Edit Sample', 'submitButtonText'=>'Update'])

    {!! Form::close() !!}

   @include('errors.list') 

@endsection

@section('footer')

@endsection

@stop
