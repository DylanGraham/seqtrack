@extends('app')
@section('content')
    <a href='/'>@include('partials.logo')</a> 

    {!! Form::open(['url'=>'samples', 'class'=>'form-inline']) !!}

    @include('partials.sample', ['submitButtonText'=>'Submit'])

    {!! Form::close() !!}

    @include('errors.list')

@endsection


@section('footer')
    @include('partials.js')
@endsection
