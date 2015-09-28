@extends('app')
@section('content')
@include('partials.navbar')
    {!! Form::open(['url'=>'batches', 'class'=>'form-inline']) !!}

    @include('partials.batch', ['formName'=>'Create Batch', 'submitButtonText'=>'Submit'])

    {!! Form::close() !!}

    @include('errors.list')

@endsection

@section('footer')
@endsection
