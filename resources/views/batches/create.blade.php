@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a> 

    {!! Form::open(['url'=>'batches', 'class'=>'form-inline']) !!}

    @include('partials.batch', ['submitButtonText'=>'Submit'])

    {!! Form::close() !!}

    @include('errors.list')

@endsection

@section('footer')
@endsection
