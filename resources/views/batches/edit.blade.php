@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a> 


    {!! Form::open(['url'=>'batches', 'class'=>'form-inline']) !!}

    {{--@include('partials.batch', ['submitButtonText'=>'Submit'])--}}

    <h1> {{ $batch->batch_name }}</h1>

    {!! Form::model($batch, ['method'=>'PATCH', 'action'=>['BatchesController@update', $batch->id], 'class'=>'form-inline']) !!}

    @include('partials.batch', ['formName'=>'Edit Batch', 'submitButtonText'=>'Update'])


    {!! Form::close() !!}

    @include('errors.list')

@endsection

@section('footer')
@endsection
