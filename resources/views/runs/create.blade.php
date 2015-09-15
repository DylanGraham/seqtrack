@extends('app')
@section('content')
@include('partials.navbar')
    <a href='/'>@include('partials.logo')</a>

    {!! Form::open(['url'=>'runs', 'class'=>'form-inline']) !!}
       @include('partials.runsForm', ['submitButtonText'=>'Submit'])
    {!! Form::close() !!}
    @include('errors.list')

@endsection

@section('footer')

@endsection
